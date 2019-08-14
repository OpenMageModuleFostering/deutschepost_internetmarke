<?php
/**
 * DeutschePost OneClickForApp
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to
 * newer versions in the future.
 *
 * PHP version 5
 *
 * @category  DeutschePost
 * @package   DeutschePost_OneClickForApp
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/**
 * DeutschePost_OneClickForApp_Block_Adminhtml_Sales_Franking_Grid
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Block_Adminhtml_Sales_Franking_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Init grid.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('frankingGrid');
        $this->setUseAjax(false);
        $this->setDefaultSort('internetmarke_id');
    }

    /**
     * Set collection for grid.
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('deutschepost_oneclickforapp/franking_collection');
        $collection->joinShipmentData();

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Add columns to grid.
     *
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'internetmarke_id',
            array(
                'header' => Mage::helper('deutschepost_oneclickforapp/data')->__('ID'),
                'index'  => 'internetmarke_id',
                'type'   => 'number',
            )
        );
        $this->addColumn(
            'status',
            array(
                'header'          => Mage::helper('deutschepost_oneclickforapp/data')->__('Ordered'),
                'index'           => 'status',
                'type'            => 'checkbox',
                'value'           => '1',
                'disabled_values' => array('0', '1'),
                'align'           => 'center',
                'renderer'        => 'DeutschePost_OneClickForApp_Block_Adminhtml_Sales_Franking_Renderer_Checkbox',
            )
        );
        $this->addColumn(
            'increment_id',
            array(
                'header'         => Mage::helper('sales')->__('Shipment #'),
                'index'          => 'increment_id',
                'frame_callback' => array($this, 'decorateIncrementId'),
                'type'           => 'text',
            )
        );
        $this->addColumn(
            'shop_order_id',
            array(
                'header' => Mage::helper('deutschepost_oneclickforapp/data')->__('Shop Order ID'),
                'index'  => 'shop_order_id',
                'type'   => 'text',
            )
        );
        $this->addColumn(
            'products',
            array(
                'header'   => Mage::helper('deutschepost_oneclickforapp/data')->__('Order Items'),
                'getter'   => array($this, 'listOrderItems'),
                'type'     => 'text',
                'filter'   => false,
                'sortable' => false,
            )
        );
        $this->addColumn(
            'row_total',
            array(
                'header'                    => Mage::helper('deutschepost_oneclickforapp/data')->__('Item Amount'),
                'index'                     => 'row_total',
                'type'                      => 'currency',
                'currency_code'             => 'EUR',
                'rate'                      => 0.01,
                'filter_condition_callback' => array($this, 'filterTotal'),
            )
        );
        $this->addColumn(
            'created_at',
            array(
                'header'       => Mage::helper('deutschepost_oneclickforapp/data')->__('Created At'),
                'index'        => 'created_at',
                'filter_index' => 'main_table.created_at',
                'type'         => 'datetime',
                'width'        => '100px',
            )
        );
        $this->addColumn(
            'updated_at',
            array(
                'header'       => Mage::helper('deutschepost_oneclickforapp/data')->__('Updated At'),
                'index'        => 'updated_at',
                'filter_index' => 'main_table.updated_at',
                'type'         => 'datetime',
                'width'        => '100px',
            )
        );
        $this->addColumn(
            'link',
            array(
                'header'         => Mage::helper('deutschepost_oneclickforapp/data')->__('Franking Link'),
                'index'          => 'shipment_id',
                'frame_callback' => array($this, 'decorateLink'),
                'type'           => 'text',
                'filter'         => false,
                'sortable'       => false,
                'is_system'      => true,
            )
        );
        $this->addColumn(
            'action',
            array(
                'header'         => Mage::helper('deutschepost_oneclickforapp/data')->__('Action'),
                'width'          => '50px',
                'type'           => 'action',
                'getter'         => 'getId',
                'actions'        => array(array(
                    'caption'     => Mage::helper('deutschepost_oneclickforapp/data')->__('Order Internetmarke'),
                    'url'         => array('base' => '*/*/order'),
                    'field'       => 'franking_id',
                    'data-column' => 'action',
                )),
                'frame_callback' => array($this, 'decorateActions'),
                'filter'         => false,
                'sortable'       => false,
                'is_system'      => true,
            )
        );

        $this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV'));

        return parent::_prepareColumns();
    }

    /**
     * Prepare mass actions.
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('internetmarke_id');
        $this->getMassactionBlock()->setFormFieldName('franking_ids');

        $this->getMassactionBlock()->addItem(
            'order',
            array(
                'label' => Mage::helper('deutschepost_oneclickforapp/data')->__('Order Internetmarke'),
                'url'   => $this->getUrl('*/*/massOrder'),
            )
        );
        $this->getMassactionBlock()->addItem(
            'download',
            array(
                'label' => Mage::helper('deutschepost_oneclickforapp/data')->__('Delete'),
                'url'   => $this->getUrl('*/*/massDelete'),
            )
        );
        $this->getMassactionBlock()->addItem(
            'print_shipping_label',
            array(
                'label' => Mage::helper('deutschepost_oneclickforapp/data')->__('Print Shipping Labels'),
                'url'   => $this->getUrl('*/*/massPrintShippingLabel'),
            )
        );

        $text = Mage::helper('deutschepost_oneclickforapp/data')->__('Please select frankings.');
        $msg  = Mage::helper('deutschepost_oneclickforapp/data')->jsQuoteEscape($text);
        $this->getMassactionBlock()->setErrorText($msg);

        return parent::_prepareMassaction();
    }

    /**
     * Wrap pdf link with anchor markup.
     *
     * @param string                                  $value The grid row value to display.
     * @param Varien_Object                           $row   The grid row data.
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     * @param                                         $isExport
     *
     * @return string
     */
    public function decorateLink($value, $row, $column, $isExport)
    {
        if (!$row->getLink()) {
            return '';
        }

        if ($isExport) {
            // fallback to original source PDF
            return $row->getLink();
        }

        $link = $this->getUrl(
            '*/sales_order_shipment/printLabel',
            array('shipment_id' => $value)
        );

        return sprintf('<a href="%s">%s</a>', $link, Mage::helper('deutschepost_oneclickforapp/data')->__('PDF'));
    }

    /**
     * Wrap shipment increment id with anchor markup.
     *
     * @param string                                  $value The grid row value to display.
     * @param Varien_Object                           $row   The grid row data.
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     * @param                                         $isExport
     *
     * @return string
     */
    public function decorateIncrementId($value, $row, $column, $isExport)
    {
        if ($isExport) {
            return $value;
        }

        $link = $this->getUrl(
            '*/sales_order_shipment/view',
            array('shipment_id' => $row->getShipmentId())
        );

        return sprintf('<a href="%s">%s</a>', $link, $value);
    }

    /**
     * Wrap pdf link with anchor markup.
     *
     * @param string                                  $value The grid row value to display.
     * @param Varien_Object                           $row   The grid row data.
     * @param Mage_Adminhtml_Block_Widget_Grid_Column $column
     * @param                                         $isExport
     *
     * @return string
     */
    public function decorateActions($value, $row, $column, $isExport)
    {
        if ($row->getStatus() == DeutschePost_OneClickForApp_Model_Franking::STATUS_ORDER_PLACED) {
            return '';
        }

        return $value;
    }

    /**
     * @param DeutschePost_OneClickForApp_Model_Resource_Franking_Collection $collection
     * @param Mage_Adminhtml_Block_Widget_Grid_Column                        $column
     */
    public function filterTotal($collection, $column)
    {
        $value = $column->getFilter()->getValue();
        if (isset($value['from']) && is_numeric($value['from'])) {
            $value['from'] = 100 * $value['from'];
        }
        if (isset($value['to']) && is_numeric($value['to'])) {
            $value['to'] = 100 * $value['to'];
        }

        $field = ($column->getFilterIndex()) ? $column->getFilterIndex() : $column->getIndex();
        $collection->addFieldToFilter($field, $value);
    }

    /**
     * Query product names for grid display.
     *
     * @param DeutschePost_OneClickForApp_Model_Franking $franking
     *
     * @return string
     */
    public function listOrderItems(DeutschePost_OneClickForApp_Model_Franking $franking)
    {
        $productNames = Mage::helper('deutschepost_internetmarke/hub')->getProductNames(
            $franking->getPplId(),
            array($franking->getProductCode())
        );
        if (!count($productNames)) {
            return '';
        }

        return implode(' ', $productNames);
    }
}

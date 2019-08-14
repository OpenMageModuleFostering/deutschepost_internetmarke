<?php
/**
 * DeutschePost ProdWs
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
 * @package   DeutschePost_ProdWs
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/**
 * DeutschePost_ProdWs_Model_Product_Sales
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 *
 * @method int getBasicproductId()
 * @method DeutschePost_ProdWs_Model_Product_Sales setBasicproductId() setBasicproductId(int $basicproductId)
 * @method int[] getAdditionalproductIds()
 * @method DeutschePost_ProdWs_Model_Product_Sales setAdditionalproductIds() setAdditionalproductIds(array $additionalproductIds)
 * @method DeutschePost_ProdWs_Model_Product_Basic getBasicProduct()
 * @method DeutschePost_ProdWs_Model_Product_Sales setBasicProduct() setBasicProduct(DeutschePost_ProdWs_Model_Product_Basic $basicProduct)
 * @method bool hasBasicProduct()
 * @method DeutschePost_ProdWs_Model_Product_Additional[] getAdditionalProducts()
 * @method DeutschePost_ProdWs_Model_Product_Sales setAdditionalProducts() setAdditionalProducts(array $additionalProducts)
 * @method bool hasAdditionalProducts()
 * @method string getSourceId()
 * @method DeutschePost_ProdWs_Model_Product_Sales setSourceId() setSourceId(string $sourceId)
 * @method int getPplId()
 * @method DeutschePost_ProdWs_Model_Product_Sales setPplId() setPplId(int $pplId)
 */
class DeutschePost_ProdWs_Model_Product_Sales
    extends DeutschePost_ProdWs_Model_Product_Abstract
{
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('deutschepost_prodws/product_sales');
    }

    /**
     * Add an associated product (basic or additional) to the sales product.
     *
     * @param DeutschePost_ProdWs_Model_Product_Associated $associatedProduct
     * @return $this
     * @throws DeutschePost_ProdWs_Exception
     */
    public function addAssociatedProduct(
        DeutschePost_ProdWs_Model_Product_Associated $associatedProduct
    ) {
        if ($associatedProduct instanceof DeutschePost_ProdWs_Model_Product_Basic) {
            $this->setBasicProduct($associatedProduct);
        } elseif ($associatedProduct instanceof DeutschePost_ProdWs_Model_Product_Additional) {
            $uniqueFields = $associatedProduct->getResource()->getUniqueFields();
            $remoteIdentifier = implode('-', $associatedProduct->toArray($uniqueFields[0]['field']));

            $additionalProducts = $this->getAdditionalProducts();
            $additionalProducts[$remoteIdentifier] = $associatedProduct;
            $this->setAdditionalProducts($additionalProducts);
        }

        return $this;
    }

    /**
     * Attach basic product and additional products to model.
     *
     * @return $this
     */
    protected function _afterLoad()
    {
        if ($this->getBasicproductId()) {
            $basicProduct = Mage::getModel('deutschepost_prodws/product_basic')
                ->load($this->getBasicproductId());
            $this->addAssociatedProduct($basicProduct);
        }

        if ($this->getAdditionalproductIds()) {
            $apCollection = Mage::getModel('deutschepost_prodws/product_additional')
                ->getCollection();
            $apCollection->addSalesProductFilter($this);
            foreach ($apCollection as $additionalProduct) {
                $this->addAssociatedProduct($additionalProduct);
            }
        }
        return parent::_afterLoad();
    }

    /**
     * Save associated products and set their IDs to the sales product before save.
     *
     * @return $this
     * @throws Exception
     */
    protected function _beforeSave()
    {
        parent::_beforeSave();

        if (!$this->hasBasicProduct()) {
            throw new DeutschePost_ProdWs_Exception('Please assign at least a basic product.');
        }

        $this->getBasicProduct()->save();

        if ($this->hasAdditionalProducts()) {
            foreach ($this->getAdditionalProducts() as $additionalProduct) {
                $additionalProduct->save();
            }
        }

        return $this;
    }
}

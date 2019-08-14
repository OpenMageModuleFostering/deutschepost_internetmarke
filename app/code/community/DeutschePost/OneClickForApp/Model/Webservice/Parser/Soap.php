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
use DeutschePost\OneClickForApp\Soap as OneClickForApp;
/**
 * DeutschePost_OneClickForApp_Model_Webservice_Parser_Soap
 *
 * Prepare webservice request data and parse webservice responses.
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Webservice_Parser_Soap
{
    /**
     * Prepare sender for the current cart position.
     *
     * @param DeutschePost_Internetmarke_Model_Shipper $shipper
     * @return OneClickForApp\NamedAddress
     */
    protected function prepareSender(DeutschePost_Internetmarke_Model_Shipper $shipper)
    {
        $senderName = new OneClickForApp\PersonName(
            null,
            null,
            $shipper->getShipperContactPersonFirstName(),
            $shipper->getShipperContactPersonLastName()
        );

        if ($shipper->getShipperContactCompanyName()) {
            $companyName = new OneClickForApp\CompanyName($shipper->getShipperContactCompanyName(), $senderName);
            $senderName = new OneClickForApp\Name(null, $companyName);
        } else {
            $senderName = new OneClickForApp\Name($senderName, null);
        }

        $split = Mage::helper('deutschepost_internetmarke/data')
            ->splitStreet($shipper->getShipperAddressStreet());

        $senderAddress = new OneClickForApp\Address(
            $split['supplement'],
            $split['street_name'],
            $split['street_number'],
            $shipper->getShipperAddressPostalCode(),
            $shipper->getShipperAddressCity(),
            $shipper->getShipperAddressCountryCode()
        );

        return new OneClickForApp\NamedAddress($senderName, $senderAddress);
    }

    /**
     * Prepare receiver for the current cart position.
     *
     * @param Mage_Sales_Model_Order_Address $shipmentAddress
     * @return OneClickForApp\NamedAddress
     */
    protected function prepareReceiver(Mage_Sales_Model_Order_Address $shipmentAddress)
    {
        $receiverName = new OneClickForApp\PersonName(
            $shipmentAddress->getPrefix(),
            null,
            $shipmentAddress->getFirstname(),
            $shipmentAddress->getLastname()
        );

        if ($shipmentAddress->getCompany()) {
            $companyName = new OneClickForApp\CompanyName($shipmentAddress->getCompany(), $receiverName);
            $receiverName = new OneClickForApp\Name(null, $companyName);
        } else {
            $receiverName = new OneClickForApp\Name($receiverName, null);
        }

        $split = Mage::helper('deutschepost_internetmarke/data')
            ->splitStreet($shipmentAddress->getStreetFull());
        $country = Mage::getModel('directory/country')->loadByCode($shipmentAddress->getCountryId());
        $countryCode = $country->getIso3Code();

        $receiverAddress = new OneClickForApp\Address(
            $split['supplement'],
            $split['street_name'],
            $split['street_number'],
            $shipmentAddress->getPostcode(),
            $shipmentAddress->getCity(),
            $countryCode
        );

        return new OneClickForApp\NamedAddress($receiverName, $receiverAddress);
    }

    /**
     * Prepare cart position for checkout request.
     *
     * @param DeutschePost_OneClickForApp_Model_Franking $franking
     * @return OneClickForApp\ShoppingCartPDFPosition
     */
    protected function prepareCartPosition(DeutschePost_OneClickForApp_Model_Franking $franking)
    {
        $storeId = $franking->getShipment()->getStoreId();
        $address = null;

        $pageFormat = Mage::getModel('deutschepost_oneclickforapp/config')->getPageFormat();
        if ($pageFormat->getIsAddressPossible()) {
            $sender   = Mage::getModel('deutschepost_internetmarke/config')->getShipper($storeId);
            $sender   = $this->prepareSender($sender);
            $receiver = $this->prepareReceiver($franking->getShipment()->getShippingAddress());
            $address  = new OneClickForApp\AddressBinding($sender, $receiver);
        }

        $cartPosition = new OneClickForApp\ShoppingCartPDFPosition(
            $franking->getProductCode(),
            null, // no images are supported currently
            $address,
            null,
            OneClickForApp\VoucherLayout::AddressZone,
            new OneClickForApp\VoucherPosition(1, 1, ($franking->getPosition() + 1)) // undocumented
        );

        return $cartPosition;
    }

    /**
     * Prepare order items for checkout request.
     *
     * @param DeutschePost_OneClickForApp_Model_Resource_Franking_Collection $frankingCollection
     * @return mixed[]
     */
    public function prepareCart(
        DeutschePost_OneClickForApp_Model_Resource_Franking_Collection $frankingCollection
    ) {
        $positions = array();
        $total = 0;
        $pplId = null;

        $count = 0;
        /** @var DeutschePost_OneClickForApp_Model_Franking $franking */
        foreach ($frankingCollection as $franking) {
            // reference pdf page, voucher, and tracking via order item position
            $franking->setPosition($count++);

            $positions[]= $this->prepareCartPosition($franking);
            $total+= $franking->getRowTotal();
            $pplId = $franking->getPplId();
        }

        return array(
            'positions' => $positions,
            'total' => $total,
            'ppl_id' => $pplId,
        );
    }

    /**
     * Extract user token from response.
     *
     * @param OneClickForApp\AuthenticateUserResponseType $response
     * @return OneClickForApp\UserToken|string
     */
    public function parseAuthenticateUserResponse(OneClickForApp\AuthenticateUserResponseType $response)
    {
        return $response->userToken;
    }

    /**
     * Extract page formats from response.
     *
     * @param OneClickForApp\RetrievePageFormatsResponseType $response
     * @return DeutschePost_OneClickForApp_Model_Resource_Pageformat_Collection
     * @throws Exception
     */
    public function parseRetrievePageFormatsResponse(OneClickForApp\RetrievePageFormatsResponseType $response)
    {
        $collection = Mage::getModel('deutschepost_oneclickforapp/pageformat')
            ->getCollection()
        ;

        $wsPageFormats = $response->pageFormat;
        if (!is_array($wsPageFormats)) {
            $wsPageFormats = array($wsPageFormats);
        }

        /** @var OneClickForApp\PageFormat $wsPageFormat */
        foreach ($wsPageFormats as $wsPageFormat) {
            $pageFormat = Mage::getModel('deutschepost_oneclickforapp/pageformat');
            $pageFormat->setSourceId($wsPageFormat->id);
            $pageFormat->setName($wsPageFormat->name);
            $pageFormat->setDescription($wsPageFormat->description);
            $pageFormat->setIsAddressPossible($wsPageFormat->isAddressPossible);
            $pageFormat->setType($wsPageFormat->pageType);

            $collection->addItem($pageFormat);
        }

        return $collection;
    }

    /**
     * Extract shop order id from response.
     *
     * @param OneClickForApp\CreateShopOrderIdResponse $response
     * @return OneClickForApp\ShopOrderId|string
     */
    public function parseCreateShopOrderIdResponse(OneClickForApp\CreateShopOrderIdResponse $response)
    {
        return $response->shopOrderId;
    }

    /**
     * Extract new wallet balance from reponse and update order items.
     *
     * @param OneClickForApp\ShoppingCartResponseType $response
     * @param DeutschePost_OneClickForApp_Model_Resource_Franking_Collection $orderItems
     * @return OneClickForApp\WalletBalance|string
     * @throws DeutschePost_OneClickForApp_Exception
     */
    public function parseShoppingCartResponse(
        OneClickForApp\ShoppingCartResponseType $response,
        DeutschePost_OneClickForApp_Model_Resource_Franking_Collection $orderItems)
    {
        $pdf = Mage::helper('deutschepost_oneclickforapp/data')->downloadPdf($response->link);

        $vouchers = $response->shoppingCart->voucherList->voucher;
        if (!is_array($vouchers)) {
            $vouchers = array($vouchers);
        }

        /** @var DeutschePost_OneClickForApp_Model_Franking $franking */
        foreach ($orderItems as $franking) {
            $frankingPdf = new Zend_Pdf();
            $frankingPdf->pages[] = clone $pdf->pages[$franking->getPosition()];

            $franking->setShopOrderId($response->shoppingCart->shopOrderId);
            $franking->getShipment()->setShippingLabel($frankingPdf->render());
            $franking->setStatus(DeutschePost_OneClickForApp_Model_Franking::STATUS_ORDER_PLACED);
            $franking->setLink($response->link);

            if (isset($vouchers[$franking->getPosition()])) {
                $franking->setVoucherId($vouchers[$franking->getPosition()]->voucherId);

                $trackId = $vouchers[$franking->getPosition()]->trackId
                    ? $vouchers[$franking->getPosition()]->trackId
                    : $vouchers[$franking->getPosition()]->voucherId;
                $franking->setTrackId($trackId);

                $carrier = Mage::getModel('deutschepost_internetmarke/shipping_carrier_internetmarke');
                $carrierCode = $carrier->getCarrierCode();
                $carrierTitle = Mage::getStoreConfig(
                    'carriers/'.$carrierCode.'/title',
                    $franking->getShipment()->getStoreId()
                );

                $track = Mage::getModel('sales/order_shipment_track')
                    ->setNumber($trackId)
                    ->setCarrierCode($carrierCode)
                    ->setTitle($carrierTitle);
                $franking->getShipment()->addTrack($track);
            }
        }

        return $response->walletBallance;
    }

    /**
     * Pull messages from the various soap fault types.
     *
     * @see AuthenticateUserException
     * @see IdentifyException
     * @see ShoppingCartValidationException
     *
     * @param SoapFault $fault
     * @return string[]
     */
    public function parseFaultMessages(SoapFault $fault)
    {
        // no exception details provided, e.g. invalid partner id
        if (!property_exists($fault, 'detail')) {
            return array($fault->getMessage());
        }

        // simple exceptions with nothing but the default message, e.g. IdentifyException
        if (!property_exists($fault->detail, 'ShoppingCartValidationException')) {
            return array($fault->getMessage());
        }

        /** @var OneClickForApp\ShoppingCartValidationException $exception */
        $exception = $fault->detail->ShoppingCartValidationException;

        if (!property_exists($exception, 'errors')) {
            return array($exception->message);
        }

        // ShoppingCartValidationException with additional exception details
        $errors = $exception->errors;
        if (!is_array($errors)) {
            $errors = array($errors);
        }

        $messages = array_map(function ($error) {
            /** @var OneClickForApp\ShoppingCartValidationErrorInfo $error */
            return $error->message;
        }, $errors);
        array_unshift($messages, $exception->message);

        return $messages;
    }
}

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
 * DeutschePost_OneClickForApp_Model_Webservice_Adapter_Soap
 *
 * Prepare and send webservice requests. These operations should all be called
 * from a central gateway class only.
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Webservice_Adapter_Soap
    implements DeutschePost_Internetmarke_Model_Webservice_Adapter_Order_Interface
{
    const EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED = 'This operation is not supported by the current module version.';

    /**
     * @var array $_classmap The defined classes
     * @access private
     */
    private static $_classmap = array(
        'AuthenticateUserRequestType' => 'DeutschePost\OneClickForApp\Soap\AuthenticateUserRequestType',
        'AuthenticateUserResponseType' => 'DeutschePost\OneClickForApp\Soap\AuthenticateUserResponseType',
        'RetrievePreviewVoucherPDFRequestType' => 'DeutschePost\OneClickForApp\Soap\RetrievePreviewVoucherPDFRequestType',
        'RetrievePreviewVoucherPNGRequestType' => 'DeutschePost\OneClickForApp\Soap\RetrievePreviewVoucherPNGRequestType',
        'RetrievePreviewVoucherResponseType' => 'DeutschePost\OneClickForApp\Soap\RetrievePreviewVoucherResponseType',
        'MotiveLink' => 'DeutschePost\OneClickForApp\Soap\MotiveLink',
        'RetrievePrivateGalleryRequestType' => 'DeutschePost\OneClickForApp\Soap\RetrievePrivateGalleryRequestType',
        'RetrievePrivateGalleryResponseType' => 'DeutschePost\OneClickForApp\Soap\RetrievePrivateGalleryResponseType',
        'ShoppingCartResponseType' => 'DeutschePost\OneClickForApp\Soap\ShoppingCartResponseType',
        'ShoppingCart' => 'DeutschePost\OneClickForApp\Soap\ShoppingCart',
        'VoucherList' => 'DeutschePost\OneClickForApp\Soap\VoucherList',
        'ShoppingCartPNGRequestType' => 'DeutschePost\OneClickForApp\Soap\ShoppingCartPNGRequestType',
        'ShoppingCartPDFRequestType' => 'DeutschePost\OneClickForApp\Soap\ShoppingCartPDFRequestType',
        'ShoppingCartValidationErrorInfo' => 'DeutschePost\OneClickForApp\Soap\ShoppingCartValidationErrorInfo',
        'AuthenticateUserException' => 'DeutschePost\OneClickForApp\Soap\AuthenticateUserException',
        'IdentifyException' => 'DeutschePost\OneClickForApp\Soap\IdentifyException',
        'InvalidProductException' => 'DeutschePost\OneClickForApp\Soap\InvalidProductException',
        'InvalidPageFormatException' => 'DeutschePost\OneClickForApp\Soap\InvalidPageFormatException',
        'InvalidMotiveException' => 'DeutschePost\OneClickForApp\Soap\InvalidMotiveException',
        'ShoppingCartValidationException' => 'DeutschePost\OneClickForApp\Soap\ShoppingCartValidationException',
        'RetrievePublicGalleryRequestType' => 'DeutschePost\OneClickForApp\Soap\RetrievePublicGalleryRequestType',
        'RetrievePublicGalleryResponseType' => 'DeutschePost\OneClickForApp\Soap\RetrievePublicGalleryResponseType',
        'ImageItem' => 'DeutschePost\OneClickForApp\Soap\ImageItem',
        'GalleryItem' => 'DeutschePost\OneClickForApp\Soap\GalleryItem',
        'Name' => 'DeutschePost\OneClickForApp\Soap\Name',
        'PersonName' => 'DeutschePost\OneClickForApp\Soap\PersonName',
        'CompanyName' => 'DeutschePost\OneClickForApp\Soap\CompanyName',
        'Address' => 'DeutschePost\OneClickForApp\Soap\Address',
        'NamedAddress' => 'DeutschePost\OneClickForApp\Soap\NamedAddress',
        'ShoppingCartPosition' => 'DeutschePost\OneClickForApp\Soap\ShoppingCartPosition',
        'AddressBinding' => 'DeutschePost\OneClickForApp\Soap\AddressBinding',
        'RetrieveOrderException' => 'DeutschePost\OneClickForApp\Soap\RetrieveOrderException',
        'RetrieveOrderRequestType' => 'DeutschePost\OneClickForApp\Soap\RetrieveOrderRequestType',
        'RetrieveOrderResponseType' => 'DeutschePost\OneClickForApp\Soap\RetrieveOrderResponseType',
        'VoucherPosition' => 'DeutschePost\OneClickForApp\Soap\VoucherPosition',
        'Position' => 'DeutschePost\OneClickForApp\Soap\Position',
        'ShoppingCartPDFPosition' => 'DeutschePost\OneClickForApp\Soap\ShoppingCartPDFPosition',
        'CreateShopOrderIdRequest' => 'DeutschePost\OneClickForApp\Soap\CreateShopOrderIdRequest',
        'CreateShopOrderIdResponse' => 'DeutschePost\OneClickForApp\Soap\CreateShopOrderIdResponse',
        'VoucherType' => 'DeutschePost\OneClickForApp\Soap\VoucherType',
        'RetrievePageFormatsRequestType' => 'DeutschePost\OneClickForApp\Soap\RetrievePageFormatsRequestType',
        'RetrievePageFormatsResponseType' => 'DeutschePost\OneClickForApp\Soap\RetrievePageFormatsResponseType',
        'PageFormat' => 'DeutschePost\OneClickForApp\Soap\PageFormat',
        'pageLayout' => 'DeutschePost\OneClickForApp\Soap\pageLayout',
        'BorderDimension' => 'DeutschePost\OneClickForApp\Soap\BorderDimension',
        'Dimension' => 'DeutschePost\OneClickForApp\Soap\Dimension'
    );

    /**
     * @var Zend_Soap_Client
     */
    protected $_client;

    /**
     * @var DeutschePost_OneClickForApp_Model_Config
     */
    protected $_config;

    /**
     * @var DeutschePost_OneClickForApp_Model_Webservice_Parser_Soap
     */
    protected $_parser;

    public function __construct(array $args)
    {
        // validate soap client
        if (!isset($args['client'])) {
            $message = 'Please set webservice client.';
            throw new DeutschePost_OneClickForApp_Exception($message);
        }
        $client = $args['client'];
        if (!$client instanceof Zend_Soap_Client) {
            $message = sprintf("Invalid webservice client given: '%s'", get_class($client));
            throw new DeutschePost_OneClickForApp_Exception($message);
        }

        // validate configuration
        if (!isset($args['config'])) {
            $message = 'Please set configuration.';
            throw new DeutschePost_OneClickForApp_Exception($message);
        }
        $config = $args['config'];
        if (!$config instanceof DeutschePost_OneClickForApp_Model_Config) {
            $message = sprintf("Invalid configuration given: '%s'", get_class($config));
            throw new DeutschePost_OneClickForApp_Exception($message);
        }

        // init soap classmap autoloading
        DeutschePost_OneClickForApp_Ns_Autoloader::init();

        // init soap client options
        $options = array(
            'wsdl' => $config->getWsdl(),
            'soap_version' => SOAP_1_1,
        );

        // init classmap
        foreach (self::$_classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        $client->setOptions($options);

        // set auth header to client
        $credential = new DeutschePost_OneClickForApp_Security_Credential(
            $config->getPartnerId(),
            $config->getKeyPhase(),
            $config->getPartnerSignature()
        );
        DeutschePost_OneClickForApp_Security_Auth::addHeader($client, $credential);

        // set soap client and config
        $this->_client = $client;
        $this->_config = $config;
        $this->_parser = Mage::getModel('deutschepost_oneclickforapp/webservice_parser_soap');
    }

    /**
     * @return Zend_Soap_Client
     */
    public function getClient()
    {
        return $this->_client;
    }

    /**
     * Obtain user token. The authenticateUser request is only performed if it
     * cannot be fetched via module config. The token will be stored in module
     * config after retrieval.
     *
     * @return OneClickForApp\UserToken|string
     * @throws Exception
     */
    public function authenticateUser()
    {
        $userToken = $this->_config->getUserToken();
        if ($userToken) {
            return $userToken;
        }

        $requestType = new OneClickForApp\AuthenticateUserRequestType(
            $this->_config->getUsername(),
            $this->_config->getPassword()
        );
        /** @var DeutschePost\OneClickForApp\Soap\AuthenticateUserResponseType $response */
        $response = $this->_client->authenticateUser($requestType);

        $userToken = $this->_parser->parseAuthenticateUserResponse($response);
        $this->_config->setUserToken($userToken);

        return $userToken;
    }

    /**
     * @return DeutschePost_OneClickForApp_Model_Resource_Pageformat_Collection
     * @throws Exception
     */
    public function retrievePageFormats()
    {
        $requestType = new OneClickForApp\RetrievePageFormatsRequestType();
        /** @var DeutschePost\OneClickForApp\Soap\RetrievePageFormatsResponseType $response */
        $response = $this->_client->retrievePageFormats($requestType);

        /** @var DeutschePost_OneClickForApp_Model_Webservice_Parser_Soap $parser */
        return $this->_parser->parseRetrievePageFormatsResponse($response);
    }

    /**
     * @return string
     * @throws Exception
     */
    public function createShopOrderId()
    {
        $userToken = $this->authenticateUser();

        $requestType = new OneClickForApp\CreateShopOrderIdRequest($userToken);
        /** @var DeutschePost\OneClickForApp\Soap\CreateShopOrderIdResponse $response */
        $response = $this->_client->createShopOrderId($requestType);

        return $this->_parser->parseCreateShopOrderIdResponse($response);
    }

    /**
     * @throws Exception
     */
    public function retrievePublicGallery()
    {
        throw new DeutschePost_OneClickForApp_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @throws Exception
     */
    public function retrievePrivateGallery()
    {
        throw new DeutschePost_OneClickForApp_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @throws Exception
     */
    public function retrievePreviewVoucherPDF()
    {
        throw new DeutschePost_OneClickForApp_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @throws Exception
     */
    public function retrievePreviewVoucherPNG()
    {
        throw new DeutschePost_OneClickForApp_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * Submit order items to API and retrieve a shipping labels PDF.
     *
     * @param DeutschePost_OneClickForApp_Model_Resource_Franking_Collection $orderItems
     * @return OneClickForApp\WalletBalance|string
     * @throws DeutschePost_OneClickForApp_Exception
     */
    public function checkoutShoppingCartPDF($orderItems)
    {
        $userToken = $this->authenticateUser();
        $shopOrderId = $this->createShopOrderId();
        $pageFormatId = $this->_config->getPageFormat()->getSourceId();
        if (!$pageFormatId) {
            $msg = 'Please configure a page format in the module configuration.';
            throw new DeutschePost_OneClickForApp_Exception($msg);
        }

        $cartData  = $this->_parser->prepareCart($orderItems);
        $positions = $cartData['positions'];
        $total     = $cartData['total'];
        $pplId     = $cartData['ppl_id'];

        $createManifest = false;
        $createShippingList = OneClickForApp\ShippingList::a0;


        $requestType = new OneClickForApp\ShoppingCartPDFRequestType(
            $userToken,
            $shopOrderId,
            $pageFormatId,
            $pplId,
            $positions,
            $total,
            $createManifest,
            $createShippingList
        );
        /** @var DeutschePost\OneClickForApp\Soap\ShoppingCartResponseType $response */
        $response = $this->_client->checkoutShoppingCartPDF($requestType);

        return $this->_parser->parseShoppingCartResponse($response, $orderItems);
    }

    /**
     * @throws Exception
     */
    public function checkoutShoppingCartPNG()
    {
        throw new DeutschePost_OneClickForApp_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @param string $shopOrderId
     * @return string
     * @throws Exception
     */
    public function retrieveOrder($shopOrderId)
    {
        throw new DeutschePost_OneClickForApp_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }
}

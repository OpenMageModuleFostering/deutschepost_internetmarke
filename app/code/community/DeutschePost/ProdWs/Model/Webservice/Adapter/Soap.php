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
use DeutschePost\ProdWs\Soap as ProdWs;
/**
 * DeutschePost_ProdWs_Model_Adapter_Soap
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Model_Webservice_Adapter_Soap
    implements DeutschePost_Internetmarke_Model_Webservice_Adapter_Product_Interface
{
    const EXCEPTION_MESSAGE_OPERATION_NOT_SUPPORTED   = 'This operation is not available in the current ProdWS version.';
    const EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED = 'This operation is not supported in the current implementation.';

    /**
     * @var array $_classmap The defined classes
     * @access private
     */
    private static $_classmap = array(
        'accountProdReferenceType' => 'DeutschePost\ProdWs\Soap\accountProdReferenceType',
        'countryNegativList' => 'DeutschePost\ProdWs\Soap\countryNegativList',
        'shortProductIdentifierType' => 'DeutschePost\ProdWs\Soap\shortProductIdentifierType',
        'extendedIdentifierType' => 'DeutschePost\ProdWs\Soap\extendedIdentifierType',
        'externIdentifierType' => 'DeutschePost\ProdWs\Soap\externIdentifierType',
        'currencyAmountType' => 'DeutschePost\ProdWs\Soap\currencyAmountType',
        'unitPriceType' => 'DeutschePost\ProdWs\Soap\unitPriceType',
        'tempPriceList' => 'DeutschePost\ProdWs\Soap\tempPriceList',
        'tempUnitPriceType' => 'DeutschePost\ProdWs\Soap\tempUnitPriceType',
        'priceType' => 'DeutschePost\ProdWs\Soap\priceType',
        'tempPriceType' => 'DeutschePost\ProdWs\Soap\tempPriceType',
        'operandType' => 'DeutschePost\ProdWs\Soap\operandType',
        'priceFormulaType' => 'DeutschePost\ProdWs\Soap\priceFormulaType',
        'formulaComponentType' => 'DeutschePost\ProdWs\Soap\formulaComponentType',
        'formulaExpressionType' => 'DeutschePost\ProdWs\Soap\formulaExpressionType',
        'priceOperandType' => 'DeutschePost\ProdWs\Soap\priceOperandType',
        'priceDefinitionType' => 'DeutschePost\ProdWs\Soap\priceDefinitionType',
        'slidingPriceType' => 'DeutschePost\ProdWs\Soap\slidingPriceType',
        'slidingPriceListType' => 'DeutschePost\ProdWs\Soap\slidingPriceListType',
        'timestampType' => 'DeutschePost\ProdWs\Soap\timestampType',
        'validityType' => 'DeutschePost\ProdWs\Soap\validityType',
        'alphanumericValueType' => 'DeutschePost\ProdWs\Soap\alphanumericValueType',
        'currencyValueType' => 'DeutschePost\ProdWs\Soap\currencyValueType',
        'dateValueType' => 'DeutschePost\ProdWs\Soap\dateValueType',
        'dimensionType' => 'DeutschePost\ProdWs\Soap\dimensionType',
        'numericValueType' => 'DeutschePost\ProdWs\Soap\numericValueType',
        'weightType' => 'DeutschePost\ProdWs\Soap\weightType',
        'propertyValueType' => 'DeutschePost\ProdWs\Soap\propertyValueType',
        'documentReferenceType' => 'DeutschePost\ProdWs\Soap\documentReferenceType',
        'specialDayType' => 'DeutschePost\ProdWs\Soap\specialDayType',
        'region' => 'DeutschePost\ProdWs\Soap\region',
        'propertyType' => 'DeutschePost\ProdWs\Soap\propertyType',
        'groupedPropertyType' => 'DeutschePost\ProdWs\Soap\groupedPropertyType',
        'propertyList' => 'DeutschePost\ProdWs\Soap\propertyList',
        'documentReferenceList' => 'DeutschePost\ProdWs\Soap\documentReferenceList',
        'formatedTextList' => 'DeutschePost\ProdWs\Soap\formatedTextList',
        'countrySpecificPropertyType' => 'DeutschePost\ProdWs\Soap\countrySpecificPropertyType',
        'catalogValueType' => 'DeutschePost\ProdWs\Soap\catalogValueType',
        'catalogType' => 'DeutschePost\ProdWs\Soap\catalogType',
        'catalogValueList' => 'DeutschePost\ProdWs\Soap\catalogValueList',
        'textBlockType' => 'DeutschePost\ProdWs\Soap\textBlockType',
        'textRowType' => 'DeutschePost\ProdWs\Soap\textRowType',
        'formatedTextType' => 'DeutschePost\ProdWs\Soap\formatedTextType',
        'nationalZipCodeListType' => 'DeutschePost\ProdWs\Soap\nationalZipCodeListType',
        'nationalZipCodeGroupType' => 'DeutschePost\ProdWs\Soap\nationalZipCodeGroupType',
        'nationalZipCodeArea' => 'DeutschePost\ProdWs\Soap\nationalZipCodeArea',
        'nationalDestinationAreaType' => 'DeutschePost\ProdWs\Soap\nationalDestinationAreaType',
        'countryType' => 'DeutschePost\ProdWs\Soap\countryType',
        'countryGroupType' => 'DeutschePost\ProdWs\Soap\countryGroupType',
        'chargeZoneType' => 'DeutschePost\ProdWs\Soap\chargeZoneType',
        'internationalDestinationAreaType' => 'DeutschePost\ProdWs\Soap\internationalDestinationAreaType',
        'countryList' => 'DeutschePost\ProdWs\Soap\countryList',
        'countryGroupList' => 'DeutschePost\ProdWs\Soap\countryGroupList',
        'chargeZoneList' => 'DeutschePost\ProdWs\Soap\chargeZoneList',
        'destinationAreaType' => 'DeutschePost\ProdWs\Soap\destinationAreaType',
        'basicProductType' => 'DeutschePost\ProdWs\Soap\basicProductType',
        'dimensionList' => 'DeutschePost\ProdWs\Soap\dimensionList',
        'groupedPropertyList' => 'DeutschePost\ProdWs\Soap\groupedPropertyList',
        'additionalProductType' => 'DeutschePost\ProdWs\Soap\additionalProductType',
        'salesProductType' => 'DeutschePost\ProdWs\Soap\salesProductType',
        'countrySpecificPropertyList' => 'DeutschePost\ProdWs\Soap\countrySpecificPropertyList',
        'usageList' => 'DeutschePost\ProdWs\Soap\usageList',
        'categoryList' => 'DeutschePost\ProdWs\Soap\categoryList',
        'stampTypeList' => 'DeutschePost\ProdWs\Soap\stampTypeList',
        'referenceTextList' => 'DeutschePost\ProdWs\Soap\referenceTextList',
        'accountProductReferenceList' => 'DeutschePost\ProdWs\Soap\accountProductReferenceList',
        'accountServiceReferenceList' => 'DeutschePost\ProdWs\Soap\accountServiceReferenceList',
        'specialServiceType' => 'DeutschePost\ProdWs\Soap\specialServiceType',
        'serviceDayList' => 'DeutschePost\ProdWs\Soap\serviceDayList',
        'exclusionDayList' => 'DeutschePost\ProdWs\Soap\exclusionDayList',
        'shortSalesProductType' => 'DeutschePost\ProdWs\Soap\shortSalesProductType',
        'priceDefinition' => 'DeutschePost\ProdWs\Soap\priceDefinition',
        'ExceptionDetailType' => 'DeutschePost\ProdWs\Soap\ExceptionDetailType',
        'searchParameterType' => 'DeutschePost\ProdWs\Soap\searchParameterType',
        'productID' => 'DeutschePost\ProdWs\Soap\productID',
        'productName' => 'DeutschePost\ProdWs\Soap\productName',
        'productPrice' => 'DeutschePost\ProdWs\Soap\productPrice',
        'productValidity' => 'DeutschePost\ProdWs\Soap\productValidity',
        'productDimensionList' => 'DeutschePost\ProdWs\Soap\productDimensionList',
        'productDimension' => 'DeutschePost\ProdWs\Soap\productDimension',
        'dimension' => 'DeutschePost\ProdWs\Soap\dimension',
        'productWeight' => 'DeutschePost\ProdWs\Soap\productWeight',
        'productPropertyList' => 'DeutschePost\ProdWs\Soap\productPropertyList',
        'property' => 'DeutschePost\ProdWs\Soap\property',
        'productUsage' => 'DeutschePost\ProdWs\Soap\productUsage',
        'productCategory' => 'DeutschePost\ProdWs\Soap\productCategory',
        'productStampType' => 'DeutschePost\ProdWs\Soap\productStampType',
        'productGroup' => 'DeutschePost\ProdWs\Soap\productGroup',
        'branch' => 'DeutschePost\ProdWs\Soap\branch',
        'additionalProductList' => 'DeutschePost\ProdWs\Soap\additionalProductList',
        'seekProductRequestType' => 'DeutschePost\ProdWs\Soap\seekProductRequestType',
        'searchParameterList' => 'DeutschePost\ProdWs\Soap\searchParameterList',
        'seekProductVersionsRequestType' => 'DeutschePost\ProdWs\Soap\seekProductVersionsRequestType',
        'getProductRequestType' => 'DeutschePost\ProdWs\Soap\getProductRequestType',
        'getProductVersionsRequestType' => 'DeutschePost\ProdWs\Soap\getProductVersionsRequestType',
        'getProductListRequestType' => 'DeutschePost\ProdWs\Soap\getProductListRequestType',
        'getProductVersionsListRequestType' => 'DeutschePost\ProdWs\Soap\getProductVersionsListRequestType',
        'getChangedProductVersionsListRequestType' => 'DeutschePost\ProdWs\Soap\getChangedProductVersionsListRequestType',
        'getProductChangeInformationRequestType' => 'DeutschePost\ProdWs\Soap\getProductChangeInformationRequestType',
        'getCatalogChangeInformationRequestType' => 'DeutschePost\ProdWs\Soap\getCatalogChangeInformationRequestType',
        'getCatalogRequestType' => 'DeutschePost\ProdWs\Soap\getCatalogRequestType',
        'getCatalogListRequestType' => 'DeutschePost\ProdWs\Soap\getCatalogListRequestType',
        'registerEMailAdressRequestType' => 'DeutschePost\ProdWs\Soap\registerEMailAdressRequestType',
        'subMandant' => 'DeutschePost\ProdWs\Soap\subMandant',
        'registerNotificationRequestType' => 'DeutschePost\ProdWs\Soap\registerNotificationRequestType',
        'seekProductResponseType' => 'DeutschePost\ProdWs\Soap\seekProductResponseType',
        'salesProduct' => 'DeutschePost\ProdWs\Soap\salesProduct',
        'seekProductVersionsResponseType' => 'DeutschePost\ProdWs\Soap\seekProductVersionsResponseType',
        'getProductResponseType' => 'DeutschePost\ProdWs\Soap\getProductResponseType',
        'getProductVersionsResponseType' => 'DeutschePost\ProdWs\Soap\getProductVersionsResponseType',
        'salesProductList' => 'DeutschePost\ProdWs\Soap\salesProductList',
        'basicProductList' => 'DeutschePost\ProdWs\Soap\basicProductList',
        'specialServiceList' => 'DeutschePost\ProdWs\Soap\specialServiceList',
        'shortSalesProductList' => 'DeutschePost\ProdWs\Soap\shortSalesProductList',
        'getProductListResponseType' => 'DeutschePost\ProdWs\Soap\getProductListResponseType',
        'getProductVersionsListResponseType' => 'DeutschePost\ProdWs\Soap\getProductVersionsListResponseType',
        'getChangedProductVersionsListResponseType' => 'DeutschePost\ProdWs\Soap\getChangedProductVersionsListResponseType',
        'getProductChangeInformationResponseType' => 'DeutschePost\ProdWs\Soap\getProductChangeInformationResponseType',
        'getCatalogChangeInformationResponseType' => 'DeutschePost\ProdWs\Soap\getCatalogChangeInformationResponseType',
        'getCatalogResponseType' => 'DeutschePost\ProdWs\Soap\getCatalogResponseType',
        'getCatalogListResponseType' => 'DeutschePost\ProdWs\Soap\getCatalogListResponseType',
        'catalogList' => 'DeutschePost\ProdWs\Soap\catalogList',
        'registerEMailAdressResponseType' => 'DeutschePost\ProdWs\Soap\registerEMailAdressResponseType',
        'registerNotificationResponseType' => 'DeutschePost\ProdWs\Soap\registerNotificationResponseType',
        'seekProductResponse' => 'DeutschePost\ProdWs\Soap\seekProductResponse',
        'Exception' => 'DeutschePost\ProdWs\Soap\ExceptionCustom',
        'seekProductVersionsResponse' => 'DeutschePost\ProdWs\Soap\seekProductVersionsResponse',
        'getProductResponse' => 'DeutschePost\ProdWs\Soap\getProductResponse',
        'getProductVersionsResponse' => 'DeutschePost\ProdWs\Soap\getProductVersionsResponse',
        'getProductListResponse' => 'DeutschePost\ProdWs\Soap\getProductListResponse',
        'getProductVersionsListResponse' => 'DeutschePost\ProdWs\Soap\getProductVersionsListResponse',
        'getChangedProductVersionsListResponse' => 'DeutschePost\ProdWs\Soap\getChangedProductVersionsListResponse',
        'getProductChangeInformationResponse' => 'DeutschePost\ProdWs\Soap\getProductChangeInformationResponse',
        'getCatalogChangeInformationResponse' => 'DeutschePost\ProdWs\Soap\getCatalogChangeInformationResponse',
        'getCatalogResponse' => 'DeutschePost\ProdWs\Soap\getCatalogResponse',
        'getCatalogListResponse' => 'DeutschePost\ProdWs\Soap\getCatalogListResponse',
        'registerEMailAdressResponse' => 'DeutschePost\ProdWs\Soap\registerEMailAdressResponse',
        'registerNotificationResponse' => 'DeutschePost\ProdWs\Soap\registerNotificationResponse'
    );

    /**
     * @var Zend_Soap_Client
     */
    protected $_client;

    /**
     * @var DeutschePost_ProdWs_Model_Config
     */
    protected $_config;

    /**
     * @var DeutschePost_ProdWs_Model_Webservice_Parser_Soap
     */
    protected $_parser;

    /**
     * @param array $args
     * @throws DeutschePost_ProdWs_Exception
     * @throws Zend_Soap_Client_Exception
     */
    public function __construct(array $args)
    {
        // validate soap client
        if (!isset($args['client'])) {
            $message = 'Please set webservice client.';
            throw new DeutschePost_ProdWs_Exception($message);
        }
        $client = $args['client'];
        if (!$client instanceof Zend_Soap_Client) {
            $message = sprintf("Invalid webservice client given: '%s'", get_class($client));
            throw new DeutschePost_ProdWs_Exception($message);
        }

        // validate configuration
        if (!isset($args['config'])) {
            $message = 'Please set configuration.';
            throw new DeutschePost_ProdWs_Exception($message);
        }
        $config = $args['config'];
        if (!$config instanceof DeutschePost_ProdWs_Model_Config) {
            $message = sprintf("Invalid configuration given: '%s'", get_class($config));
            throw new DeutschePost_ProdWs_Exception($message);
        }

        // init soap classmap autoloading
        DeutschePost_ProdWs_Ns_Autoloader::init();

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
        $credential = new DeutschePost_ProdWs_Wss_Credential(
            htmlentities($config->getUsername(), ENT_XML1),
            htmlentities($config->getPassword(), ENT_XML1)
        );
        DeutschePost_ProdWs_Wss_Auth::addWssLoginHeader($client, $credential);

        // set soap client and config
        $this->_client = $client;
        $this->_config = $config;
        $this->_parser = Mage::getModel('deutschepost_prodws/webservice_parser_soap');
    }

    /**
     * @return Zend_Soap_Client
     */
    public function getClient()
    {
        return $this->_client;
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function seekProduct()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_SUPPORTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function seekProductVersions()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_SUPPORTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function getProduct()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_SUPPORTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function getProductVersions()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_SUPPORTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function getProductList()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @return DeutschePost_ProdWs_Model_Resource_Product_Sales_Collection
     * @throws Exception
     */
    public function getProductVersionsList()
    {
        $mandantID = $this->_config->getMandantId();
        $subMandantID = null;
        $dedicatedProducts = true;
        $responseMode = 0;
        $onlyChanges = null;
        $referenceDate = null;
        $shortList = null;

        $requestType = new ProdWs\getProductVersionsListRequestType(
            $mandantID,
            $subMandantID,
            $dedicatedProducts,
            $responseMode,
            $onlyChanges,
            $referenceDate,
            $shortList
        );

        try {
            /** @var DeutschePost\ProdWs\Soap\getProductVersionsListResponse $response */
            $response = $this->_client->getProductVersionsList($requestType);
            DeutschePost_Internetmarke_Logger::logInfo($response);
        } catch (Exception $e) {
            DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logRequest($this->_client);
            DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logResponse($this->_client);
            DeutschePost_Internetmarke_Model_Webservice_Logger_Soap::logFault($e);
            throw $e;
        }

        return $this->_parser->parseProductVersionsListResponse($response);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function getChangedProductVersionsList()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_SUPPORTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function getCatalog()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function getCatalogList()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function registerEMailAdress()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function registerNotification()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function getProductChangeInformation()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }

    /**
     * @throws DeutschePost_ProdWs_Exception
     */
    public function getCatalogChangeInformation()
    {
        throw new DeutschePost_ProdWs_Exception(self::EXCEPTION_MESSAGE_OPERATION_NOT_IMPLEMENTED);
    }
}

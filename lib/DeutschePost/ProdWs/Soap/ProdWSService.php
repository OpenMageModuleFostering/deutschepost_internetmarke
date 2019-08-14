<?php

namespace DeutschePost\ProdWs\Soap;

include_once('dayType.php');
include_once('accountProdReferenceType.php');
include_once('countryNegativList.php');
include_once('shortProductIdentifierType.php');
include_once('extendedIdentifierType.php');
include_once('externIdentifierType.php');
include_once('currencyAmountType.php');
include_once('unitPriceType.php');
include_once('tempPriceList.php');
include_once('tempUnitPriceType.php');
include_once('priceType.php');
include_once('tempPriceType.php');
include_once('operandType.php');
include_once('priceFormulaType.php');
include_once('formulaComponentType.php');
include_once('formulaExpressionType.php');
include_once('priceOperandType.php');
include_once('priceDefinitionType.php');
include_once('slidingPriceType.php');
include_once('slidingPriceListType.php');
include_once('timestampType.php');
include_once('validityType.php');
include_once('alphanumericValueType.php');
include_once('currencyValueType.php');
include_once('dateValueType.php');
include_once('dimensionType.php');
include_once('numericValueType.php');
include_once('weightType.php');
include_once('propertyValueType.php');
include_once('documentReferenceType.php');
include_once('specialDayType.php');
include_once('region.php');
include_once('propertyType.php');
include_once('groupedPropertyType.php');
include_once('propertyList.php');
include_once('documentReferenceList.php');
include_once('formatedTextList.php');
include_once('countrySpecificPropertyType.php');
include_once('catalogValueType.php');
include_once('catalogType.php');
include_once('catalogValueList.php');
include_once('textBlockType.php');
include_once('textRowType.php');
include_once('formatedTextType.php');
include_once('nationalZipCodeListType.php');
include_once('nationalZipCodeGroupType.php');
include_once('nationalZipCodeArea.php');
include_once('nationalDestinationAreaType.php');
include_once('countryType.php');
include_once('countryGroupType.php');
include_once('chargeZoneType.php');
include_once('internationalDestinationAreaType.php');
include_once('countryList.php');
include_once('countryGroupList.php');
include_once('chargeZoneList.php');
include_once('destinationAreaType.php');
include_once('basicProductType.php');
include_once('dimensionList.php');
include_once('groupedPropertyList.php');
include_once('additionalProductType.php');
include_once('salesProductType.php');
include_once('countrySpecificPropertyList.php');
include_once('usageList.php');
include_once('categoryList.php');
include_once('stampTypeList.php');
include_once('referenceTextList.php');
include_once('accountProductReferenceList.php');
include_once('accountServiceReferenceList.php');
include_once('specialServiceType.php');
include_once('serviceDayList.php');
include_once('exclusionDayList.php');
include_once('shortSalesProductType.php');
include_once('priceDefinition.php');
include_once('ExceptionDetailType.php');
include_once('alphanumericOperatorType.php');
include_once('logicalOperatorType.php');
include_once('numericOperatorType.php');
include_once('searchParameterType.php');
include_once('productID.php');
include_once('productName.php');
include_once('productPrice.php');
include_once('productValidity.php');
include_once('productDimensionList.php');
include_once('productDimension.php');
include_once('dimension.php');
include_once('productWeight.php');
include_once('productPropertyList.php');
include_once('property.php');
include_once('productUsage.php');
include_once('productCategory.php');
include_once('productStampType.php');
include_once('productGroup.php');
include_once('branch.php');
include_once('additionalProductList.php');
include_once('seekProductRequestType.php');
include_once('searchParameterList.php');
include_once('seekProductVersionsRequestType.php');
include_once('getProductRequestType.php');
include_once('getProductVersionsRequestType.php');
include_once('getProductListRequestType.php');
include_once('getProductVersionsListRequestType.php');
include_once('getChangedProductVersionsListRequestType.php');
include_once('getProductChangeInformationRequestType.php');
include_once('getCatalogChangeInformationRequestType.php');
include_once('getCatalogRequestType.php');
include_once('getCatalogListRequestType.php');
include_once('registerEMailAdressRequestType.php');
include_once('subMandant.php');
include_once('registerNotificationRequestType.php');
include_once('seekProductResponseType.php');
include_once('salesProduct.php');
include_once('seekProductVersionsResponseType.php');
include_once('getProductResponseType.php');
include_once('getProductVersionsResponseType.php');
include_once('salesProductList.php');
include_once('basicProductList.php');
include_once('specialServiceList.php');
include_once('shortSalesProductList.php');
include_once('getProductListResponseType.php');
include_once('getProductVersionsListResponseType.php');
include_once('getChangedProductVersionsListResponseType.php');
include_once('getProductChangeInformationResponseType.php');
include_once('getCatalogChangeInformationResponseType.php');
include_once('getCatalogResponseType.php');
include_once('getCatalogListResponseType.php');
include_once('catalogList.php');
include_once('registerEMailAdressResponseType.php');
include_once('registerNotificationResponseType.php');
include_once('seekProductResponse.php');
include_once('ExceptionCustom.php');
include_once('seekProductVersionsResponse.php');
include_once('getProductResponse.php');
include_once('getProductVersionsResponse.php');
include_once('getProductListResponse.php');
include_once('getProductVersionsListResponse.php');
include_once('getChangedProductVersionsListResponse.php');
include_once('getProductChangeInformationResponse.php');
include_once('getCatalogChangeInformationResponse.php');
include_once('getCatalogResponse.php');
include_once('getCatalogListResponse.php');
include_once('registerEMailAdressResponse.php');
include_once('registerNotificationResponse.php');

class ProdWSService extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     * @access private
     */
    private static $classmap = array(
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
      'registerNotificationResponse' => 'DeutschePost\ProdWs\Soap\registerNotificationResponse');

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     * @access public
     */
    public function __construct(array $options = array(), $wsdl = 'ProductInformationWeb_1_1.wsdl')
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }

      parent::__construct($wsdl, $options);
    }

    /**
     * @param seekProductRequestType $parameter
     * @access public
     * @return seekProductResponse
     */
    public function seekProduct(seekProductRequestType $parameter)
    {
      return $this->__soapCall('seekProduct', array($parameter));
    }

    /**
     * @param seekProductVersionsRequestType $parameter
     * @access public
     * @return seekProductVersionsResponse
     */
    public function seekProductVersions(seekProductVersionsRequestType $parameter)
    {
      return $this->__soapCall('seekProductVersions', array($parameter));
    }

    /**
     * @param getProductRequestType $parameter
     * @access public
     * @return getProductResponse
     */
    public function getProduct(getProductRequestType $parameter)
    {
      return $this->__soapCall('getProduct', array($parameter));
    }

    /**
     * @param getProductVersionsRequestType $parameter
     * @access public
     * @return getProductVersionsResponse
     */
    public function getProductVersions(getProductVersionsRequestType $parameter)
    {
      return $this->__soapCall('getProductVersions', array($parameter));
    }

    /**
     * @param getProductListRequestType $parameter
     * @access public
     * @return getProductListResponse
     */
    public function getProductList(getProductListRequestType $parameter)
    {
      return $this->__soapCall('getProductList', array($parameter));
    }

    /**
     * @param getProductVersionsListRequestType $parameter
     * @access public
     * @return getProductVersionsListResponse
     */
    public function getProductVersionsList(getProductVersionsListRequestType $parameter)
    {
      return $this->__soapCall('getProductVersionsList', array($parameter));
    }

    /**
     * @param getChangedProductVersionsListRequestType $parameter
     * @access public
     * @return getChangedProductVersionsListResponse
     */
    public function getChangedProductVersionsList(getChangedProductVersionsListRequestType $parameter)
    {
      return $this->__soapCall('getChangedProductVersionsList', array($parameter));
    }

    /**
     * @param registerEMailAdressRequestType $parameter
     * @access public
     * @return registerEMailAdressResponse
     */
    public function registerEMailAdress(registerEMailAdressRequestType $parameter)
    {
      return $this->__soapCall('registerEMailAdress', array($parameter));
    }

    /**
     * @param registerNotificationRequestType $parameter
     * @access public
     * @return registerNotificationResponse
     */
    public function registerNotification(registerNotificationRequestType $parameter)
    {
      return $this->__soapCall('registerNotification', array($parameter));
    }

    /**
     * @param getCatalogRequestType $parameter
     * @access public
     * @return getCatalogResponse
     */
    public function getCatalog(getCatalogRequestType $parameter)
    {
      return $this->__soapCall('getCatalog', array($parameter));
    }

    /**
     * @param getCatalogListRequestType $parameter
     * @access public
     * @return getCatalogListResponse
     */
    public function getCatalogList(getCatalogListRequestType $parameter)
    {
      return $this->__soapCall('getCatalogList', array($parameter));
    }

    /**
     * @param getProductChangeInformationRequestType $parameter
     * @access public
     * @return getProductChangeInformationResponse
     */
    public function getProductChangeInformation(getProductChangeInformationRequestType $parameter)
    {
      return $this->__soapCall('getProductChangeInformation', array($parameter));
    }

    /**
     * @param getCatalogChangeInformationRequestType $parameter
     * @access public
     * @return getCatalogChangeInformationResponse
     */
    public function getCatalogChangeInformation(getCatalogChangeInformationRequestType $parameter)
    {
      return $this->__soapCall('getCatalogChangeInformation', array($parameter));
    }

}

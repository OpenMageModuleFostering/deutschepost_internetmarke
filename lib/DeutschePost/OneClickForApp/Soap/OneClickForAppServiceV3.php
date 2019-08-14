<?php

namespace DeutschePost\OneClickForApp\Soap;

include_once('VoucherLayout.php');
include_once('ShippingList.php');
include_once('AuthenticateUserRequestType.php');
include_once('AuthenticateUserResponseType.php');
include_once('RetrievePreviewVoucherPDFRequestType.php');
include_once('RetrievePreviewVoucherPNGRequestType.php');
include_once('RetrievePreviewVoucherResponseType.php');
include_once('MotiveLink.php');
include_once('RetrievePrivateGalleryRequestType.php');
include_once('RetrievePrivateGalleryResponseType.php');
include_once('ShoppingCartResponseType.php');
include_once('ShoppingCart.php');
include_once('VoucherList.php');
include_once('ShoppingCartPNGRequestType.php');
include_once('ShoppingCartPDFRequestType.php');
include_once('AuthenticateUserErrorCodes.php');
include_once('ShoppingCartValidationErrorCodes.php');
include_once('ShoppingCartValidationErrorInfo.php');
include_once('AuthenticateUserException.php');
include_once('IdentifyException.php');
include_once('InvalidProductException.php');
include_once('InvalidPageFormatException.php');
include_once('InvalidMotiveException.php');
include_once('ShoppingCartValidationException.php');
include_once('RetrievePublicGalleryRequestType.php');
include_once('RetrievePublicGalleryResponseType.php');
include_once('ImageItem.php');
include_once('GalleryItem.php');
include_once('Name.php');
include_once('PersonName.php');
include_once('CompanyName.php');
include_once('Address.php');
include_once('NamedAddress.php');
include_once('ShoppingCartPosition.php');
include_once('AddressBinding.php');
include_once('RetrieveOrderErrorCodes.php');
include_once('RetrieveOrderException.php');
include_once('RetrieveOrderRequestType.php');
include_once('RetrieveOrderResponseType.php');
include_once('VoucherPosition.php');
include_once('Position.php');
include_once('ShoppingCartPDFPosition.php');
include_once('CreateShopOrderIdRequest.php');
include_once('CreateShopOrderIdResponse.php');
include_once('VoucherType.php');
include_once('RetrievePageFormatsRequestType.php');
include_once('RetrievePageFormatsResponseType.php');
include_once('PageFormat.php');
include_once('pageLayout.php');
include_once('BorderDimension.php');
include_once('Dimension.php');
include_once('Orientation.php');
include_once('PageType.php');

class OneClickForAppServiceV3 extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     * @access private
     */
    private static $classmap = array(
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
      'Dimension' => 'DeutschePost\OneClickForApp\Soap\Dimension');

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     * @access public
     */
    public function __construct(array $options = array(), $wsdl = 'OneClickForAppV3.wsdl')
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      
      parent::__construct($wsdl, $options);
    }

    /**
     * @param RetrievePageFormatsRequestType $parameter
     * @access public
     * @return RetrievePageFormatsResponseType
     */
    public function retrievePageFormats(RetrievePageFormatsRequestType $parameter)
    {
      return $this->__soapCall('retrievePageFormats', array($parameter));
    }

    /**
     * @param RetrievePublicGalleryRequestType $parameter
     * @access public
     * @return RetrievePublicGalleryResponseType
     */
    public function retrievePublicGallery(RetrievePublicGalleryRequestType $parameter)
    {
      return $this->__soapCall('retrievePublicGallery', array($parameter));
    }

    /**
     * @param ShoppingCartPDFRequestType $parameter
     * @access public
     * @return ShoppingCartResponseType
     */
    public function checkoutShoppingCartPDF(ShoppingCartPDFRequestType $parameter)
    {
      return $this->__soapCall('checkoutShoppingCartPDF', array($parameter));
    }

    /**
     * @param ShoppingCartPNGRequestType $parameter
     * @access public
     * @return ShoppingCartResponseType
     */
    public function checkoutShoppingCartPNG(ShoppingCartPNGRequestType $parameter)
    {
      return $this->__soapCall('checkoutShoppingCartPNG', array($parameter));
    }

    /**
     * @param AuthenticateUserRequestType $parameter
     * @access public
     * @return AuthenticateUserResponseType
     */
    public function authenticateUser(AuthenticateUserRequestType $parameter)
    {
      return $this->__soapCall('authenticateUser', array($parameter));
    }

    /**
     * @param RetrievePreviewVoucherPDFRequestType $parameter
     * @access public
     * @return RetrievePreviewVoucherResponseType
     */
    public function retrievePreviewVoucherPDF(RetrievePreviewVoucherPDFRequestType $parameter)
    {
      return $this->__soapCall('retrievePreviewVoucherPDF', array($parameter));
    }

    /**
     * @param RetrievePreviewVoucherPNGRequestType $parameter
     * @access public
     * @return RetrievePreviewVoucherResponseType
     */
    public function retrievePreviewVoucherPNG(RetrievePreviewVoucherPNGRequestType $parameter)
    {
      return $this->__soapCall('retrievePreviewVoucherPNG', array($parameter));
    }

    /**
     * @param RetrievePrivateGalleryRequestType $parameter
     * @access public
     * @return RetrievePrivateGalleryResponseType
     */
    public function retrievePrivateGallery(RetrievePrivateGalleryRequestType $parameter)
    {
      return $this->__soapCall('retrievePrivateGallery', array($parameter));
    }

    /**
     * @param RetrieveOrderRequestType $parameter
     * @access public
     * @return RetrieveOrderResponseType
     */
    public function retrieveOrder(RetrieveOrderRequestType $parameter)
    {
      return $this->__soapCall('retrieveOrder', array($parameter));
    }

    /**
     * @param CreateShopOrderIdRequest $createShopOrderIdRequest
     * @access public
     * @return CreateShopOrderIdResponse
     */
    public function createShopOrderId(CreateShopOrderIdRequest $createShopOrderIdRequest)
    {
      return $this->__soapCall('createShopOrderId', array($createShopOrderIdRequest));
    }

}

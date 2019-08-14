<?php

namespace DeutschePost\ProdWs\Soap;

class getProductResponseType
{

    /**
     * @var salesProductType $SalesProduct
     * @access public
     */
    public $SalesProduct = null;

    /**
     * @var basicProductType $BasicProduct
     * @access public
     */
    public $BasicProduct = null;

    /**
     * @var additionalProductType $AdditionalProduct
     * @access public
     */
    public $AdditionalProduct = null;

    /**
     * @var specialServiceType $SpecialService
     * @access public
     */
    public $SpecialService = null;

    /**
     * @var string_maxLen1000 $message
     * @access public
     */
    public $message = null;

    /**
     * @param salesProductType $SalesProduct
     * @param basicProductType $BasicProduct
     * @param additionalProductType $AdditionalProduct
     * @param specialServiceType $SpecialService
     * @param string_maxLen1000 $message
     * @access public
     */
    public function __construct($SalesProduct, $BasicProduct, $AdditionalProduct, $SpecialService, $message)
    {
      $this->SalesProduct = $SalesProduct;
      $this->BasicProduct = $BasicProduct;
      $this->AdditionalProduct = $AdditionalProduct;
      $this->SpecialService = $SpecialService;
      $this->message = $message;
    }

}

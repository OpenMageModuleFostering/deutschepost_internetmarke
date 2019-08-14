<?php

namespace DeutschePost\ProdWs\Soap;

class priceDefinition
{

    /**
     * @var currencyAmountType $commercialGrossPrice
     * @access public
     */
    public $commercialGrossPrice = null;

    /**
     * @var validityType $priceValidity
     * @access public
     */
    public $priceValidity = null;

    /**
     * @param currencyAmountType $commercialGrossPrice
     * @param validityType $priceValidity
     * @access public
     */
    public function __construct($commercialGrossPrice, $priceValidity)
    {
      $this->commercialGrossPrice = $commercialGrossPrice;
      $this->priceValidity = $priceValidity;
    }

}

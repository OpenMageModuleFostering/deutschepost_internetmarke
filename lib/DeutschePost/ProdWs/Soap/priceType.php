<?php

namespace DeutschePost\ProdWs\Soap;

class priceType
{

    /**
     * @var currencyAmountType $calculatedNetPrice
     * @access public
     */
    public $calculatedNetPrice = null;

    /**
     * @var currencyAmountType $calculatedGrossPrice
     * @access public
     */
    public $calculatedGrossPrice = null;

    /**
     * @var currencyAmountType $commercialBalance
     * @access public
     */
    public $commercialBalance = null;

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
     * @param currencyAmountType $calculatedNetPrice
     * @param currencyAmountType $calculatedGrossPrice
     * @param currencyAmountType $commercialBalance
     * @param currencyAmountType $commercialGrossPrice
     * @param validityType $priceValidity
     * @access public
     */
    public function __construct($calculatedNetPrice, $calculatedGrossPrice, $commercialBalance, $commercialGrossPrice, $priceValidity)
    {
      $this->calculatedNetPrice = $calculatedNetPrice;
      $this->calculatedGrossPrice = $calculatedGrossPrice;
      $this->commercialBalance = $commercialBalance;
      $this->commercialGrossPrice = $commercialGrossPrice;
      $this->priceValidity = $priceValidity;
    }

}

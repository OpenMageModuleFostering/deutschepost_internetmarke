<?php

namespace DeutschePost\ProdWs\Soap;

class unitPriceType
{

    /**
     * @var currencyAmountType $netPrice
     * @access public
     */
    public $netPrice = null;

    /**
     * @var float $rate
     * @access public
     */
    public $rate = null;

    /**
     * @var currencyAmountType $grossPrice
     * @access public
     */
    public $grossPrice = null;

    /**
     * @var validityType $priceValidity
     * @access public
     */
    public $priceValidity = null;

    /**
     * @var tempPriceList $tempPriceList
     * @access public
     */
    public $tempPriceList = null;

    /**
     * @param currencyAmountType $netPrice
     * @param float $rate
     * @param currencyAmountType $grossPrice
     * @param validityType $priceValidity
     * @param tempPriceList $tempPriceList
     * @access public
     */
    public function __construct($netPrice, $rate, $grossPrice, $priceValidity, $tempPriceList)
    {
      $this->netPrice = $netPrice;
      $this->rate = $rate;
      $this->grossPrice = $grossPrice;
      $this->priceValidity = $priceValidity;
      $this->tempPriceList = $tempPriceList;
    }

}

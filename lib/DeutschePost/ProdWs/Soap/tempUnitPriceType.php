<?php

namespace DeutschePost\ProdWs\Soap;

class tempUnitPriceType
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
     * @var timestampType $validFrom
     * @access public
     */
    public $validFrom = null;

    /**
     * @var timestampType $validTo
     * @access public
     */
    public $validTo = null;

    /**
     * @param currencyAmountType $netPrice
     * @param float $rate
     * @param currencyAmountType $grossPrice
     * @param timestampType $validFrom
     * @param timestampType $validTo
     * @access public
     */
    public function __construct($netPrice, $rate, $grossPrice, $validFrom, $validTo)
    {
      $this->netPrice = $netPrice;
      $this->rate = $rate;
      $this->grossPrice = $grossPrice;
      $this->validFrom = $validFrom;
      $this->validTo = $validTo;
    }

}

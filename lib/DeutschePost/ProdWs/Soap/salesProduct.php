<?php

namespace DeutschePost\ProdWs\Soap;

class salesProduct
{

    /**
     * @var shortProductIdentifierType $salesProductShortIdentifier
     * @access public
     */
    public $salesProductShortIdentifier = null;

    /**
     * @var currencyAmountType $salesProductGrossPrice
     * @access public
     */
    public $salesProductGrossPrice = null;

    /**
     * @param shortProductIdentifierType $salesProductShortIdentifier
     * @param currencyAmountType $salesProductGrossPrice
     * @access public
     */
    public function __construct($salesProductShortIdentifier, $salesProductGrossPrice)
    {
      $this->salesProductShortIdentifier = $salesProductShortIdentifier;
      $this->salesProductGrossPrice = $salesProductGrossPrice;
    }

}

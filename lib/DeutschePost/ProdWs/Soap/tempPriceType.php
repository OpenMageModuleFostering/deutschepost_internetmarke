<?php

namespace DeutschePost\ProdWs\Soap;

class tempPriceType
{

    /**
     * @var priceType $price
     * @access public
     */
    public $price = null;

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
     * @param priceType $price
     * @param timestampType $validFrom
     * @param timestampType $validTo
     * @access public
     */
    public function __construct($price, $validFrom, $validTo)
    {
      $this->price = $price;
      $this->validFrom = $validFrom;
      $this->validTo = $validTo;
    }

}

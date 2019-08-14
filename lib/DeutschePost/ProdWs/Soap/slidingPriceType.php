<?php

namespace DeutschePost\ProdWs\Soap;

class slidingPriceType
{

    /**
     * @var numericValueType $slidingScale
     * @access public
     */
    public $slidingScale = null;

    /**
     * @var unitPriceType $price
     * @access public
     */
    public $price = null;

    /**
     * @param numericValueType $slidingScale
     * @param unitPriceType $price
     * @access public
     */
    public function __construct($slidingScale, $price)
    {
      $this->slidingScale = $slidingScale;
      $this->price = $price;
    }

}

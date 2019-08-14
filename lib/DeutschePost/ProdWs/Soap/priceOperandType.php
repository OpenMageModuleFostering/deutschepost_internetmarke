<?php

namespace DeutschePost\ProdWs\Soap;

class priceOperandType
{

    /**
     * @var anonymous34 $value
     * @access public
     */
    public $value = null;

    /**
     * @var anonymous35 $currency
     * @access public
     */
    public $currency = null;

    /**
     * @param anonymous34 $value
     * @param anonymous35 $currency
     * @access public
     */
    public function __construct($value, $currency)
    {
      $this->value = $value;
      $this->currency = $currency;
    }

}

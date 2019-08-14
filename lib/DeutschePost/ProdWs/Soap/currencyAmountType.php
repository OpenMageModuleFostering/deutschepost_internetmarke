<?php

namespace DeutschePost\ProdWs\Soap;

class currencyAmountType
{

    /**
     * @var anonymous21 $sign
     * @access public
     */
    public $sign = null;

    /**
     * @var anonymous22 $value
     * @access public
     */
    public $value = null;

    /**
     * @var anonymous23 $currency
     * @access public
     */
    public $currency = null;

    /**
     * @var boolean $calculated
     * @access public
     */
    public $calculated = null;

    /**
     * @param anonymous21 $sign
     * @param anonymous22 $value
     * @param anonymous23 $currency
     * @param boolean $calculated
     * @access public
     */
    public function __construct($sign, $value, $currency, $calculated)
    {
      $this->sign = $sign;
      $this->value = $value;
      $this->currency = $currency;
      $this->calculated = $calculated;
    }

}

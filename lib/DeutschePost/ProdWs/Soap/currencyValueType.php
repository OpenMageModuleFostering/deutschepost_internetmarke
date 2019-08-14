<?php

namespace DeutschePost\ProdWs\Soap;

class currencyValueType
{

    /**
     * @var currencyAmountType $minValue
     * @access public
     */
    public $minValue = null;

    /**
     * @var currencyAmountType $maxValue
     * @access public
     */
    public $maxValue = null;

    /**
     * @var currencyAmountType $fixValue
     * @access public
     */
    public $fixValue = null;

    /**
     * @param currencyAmountType $minValue
     * @param currencyAmountType $maxValue
     * @param currencyAmountType $fixValue
     * @access public
     */
    public function __construct($minValue, $maxValue, $fixValue)
    {
      $this->minValue = $minValue;
      $this->maxValue = $maxValue;
      $this->fixValue = $fixValue;
    }

}

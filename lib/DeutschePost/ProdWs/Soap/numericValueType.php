<?php

namespace DeutschePost\ProdWs\Soap;

class numericValueType
{

    /**
     * @var float $minValue
     * @access public
     */
    public $minValue = null;

    /**
     * @var float $maxValue
     * @access public
     */
    public $maxValue = null;

    /**
     * @var float $fixValue
     * @access public
     */
    public $fixValue = null;

    /**
     * @var string_maxLen10 $unit
     * @access public
     */
    public $unit = null;

    /**
     * @param float $minValue
     * @param float $maxValue
     * @param float $fixValue
     * @param string_maxLen10 $unit
     * @access public
     */
    public function __construct($minValue, $maxValue, $fixValue, $unit)
    {
      $this->minValue = $minValue;
      $this->maxValue = $maxValue;
      $this->fixValue = $fixValue;
      $this->unit = $unit;
    }

}

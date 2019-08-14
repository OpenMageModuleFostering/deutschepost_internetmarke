<?php

namespace DeutschePost\ProdWs\Soap;

class alphanumericValueType
{

    /**
     * @var string $firstValue
     * @access public
     */
    public $firstValue = null;

    /**
     * @var string $lastValue
     * @access public
     */
    public $lastValue = null;

    /**
     * @var string $fixValue
     * @access public
     */
    public $fixValue = null;

    /**
     * @param string $firstValue
     * @param string $lastValue
     * @param string $fixValue
     * @access public
     */
    public function __construct($firstValue, $lastValue, $fixValue)
    {
      $this->firstValue = $firstValue;
      $this->lastValue = $lastValue;
      $this->fixValue = $fixValue;
    }

}

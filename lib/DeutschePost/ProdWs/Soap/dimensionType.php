<?php

namespace DeutschePost\ProdWs\Soap;

class dimensionType
{

    /**
     * @var anonymous46 $value
     * @access public
     */
    public $value = null;

    /**
     * @var anonymous47 $unit
     * @access public
     */
    public $unit = null;

    /**
     * @param anonymous46 $value
     * @param anonymous47 $unit
     * @access public
     */
    public function __construct($value, $unit)
    {
      $this->value = $value;
      $this->unit = $unit;
    }

}

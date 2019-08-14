<?php

namespace DeutschePost\ProdWs\Soap;

class weightType
{

    /**
     * @var anonymous50 $value
     * @access public
     */
    public $value = null;

    /**
     * @var anonymous51 $unit
     * @access public
     */
    public $unit = null;

    /**
     * @param anonymous50 $value
     * @param anonymous51 $unit
     * @access public
     */
    public function __construct($value, $unit)
    {
      $this->value = $value;
      $this->unit = $unit;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class property
{

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var propertyValueType $value
     * @access public
     */
    public $value = null;

    /**
     * @param string_maxLen50 $name
     * @param propertyValueType $value
     * @access public
     */
    public function __construct($name, $value)
    {
      $this->name = $name;
      $this->value = $value;
    }

}

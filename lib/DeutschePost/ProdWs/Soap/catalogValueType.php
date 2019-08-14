<?php

namespace DeutschePost\ProdWs\Soap;

class catalogValueType
{

    /**
     * @var string $name
     * @access public
     */
    public $name = null;

    /**
     * @var string $value
     * @access public
     */
    public $value = null;

    /**
     * @var propertyList $propertyList
     * @access public
     */
    public $propertyList = null;

    /**
     * @var validityType $validity
     * @access public
     */
    public $validity = null;

    /**
     * @param string $name
     * @param string $value
     * @param propertyList $propertyList
     * @param validityType $validity
     * @access public
     */
    public function __construct($name, $value, $propertyList, $validity)
    {
      $this->name = $name;
      $this->value = $value;
      $this->propertyList = $propertyList;
      $this->validity = $validity;
    }

}

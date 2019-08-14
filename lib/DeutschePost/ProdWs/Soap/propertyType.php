<?php

namespace DeutschePost\ProdWs\Soap;

class propertyType
{

    /**
     * @var propertyValueType $propertyValue
     * @access public
     */
    public $propertyValue = null;

    /**
     * @var unitPriceType $price
     * @access public
     */
    public $price = null;

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var string_maxLen20 $shortName
     * @access public
     */
    public $shortName = null;

    /**
     * @var string_maxLen1000 $description
     * @access public
     */
    public $description = null;

    /**
     * @var string_maxLen1000 $annotation
     * @access public
     */
    public $annotation = null;

    /**
     * @param propertyValueType $propertyValue
     * @param unitPriceType $price
     * @param string_maxLen50 $name
     * @param string_maxLen20 $shortName
     * @param string_maxLen1000 $description
     * @param string_maxLen1000 $annotation
     * @access public
     */
    public function __construct($propertyValue, $price, $name, $shortName, $description, $annotation)
    {
      $this->propertyValue = $propertyValue;
      $this->price = $price;
      $this->name = $name;
      $this->shortName = $shortName;
      $this->description = $description;
      $this->annotation = $annotation;
    }

}

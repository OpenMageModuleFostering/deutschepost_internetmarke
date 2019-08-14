<?php

namespace DeutschePost\ProdWs\Soap;

class propertyList
{

    /**
     * @var propertyType $property
     * @access public
     */
    public $property = null;

    /**
     * @param propertyType $property
     * @access public
     */
    public function __construct($property)
    {
      $this->property = $property;
    }

}

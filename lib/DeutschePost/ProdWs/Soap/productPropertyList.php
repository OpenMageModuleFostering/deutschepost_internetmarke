<?php

namespace DeutschePost\ProdWs\Soap;

class productPropertyList
{

    /**
     * @var property $property
     * @access public
     */
    public $property = null;

    /**
     * @param property $property
     * @access public
     */
    public function __construct($property)
    {
      $this->property = $property;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class countrySpecificPropertyType
{

    /**
     * @var propertyType $property
     * @access public
     */
    public $property = null;

    /**
     * @var countryType[] $country
     * @access public
     */
    public $country = null;

    /**
     * @param propertyType $property
     * @param countryType[] $country
     * @access public
     */
    public function __construct($property, $country)
    {
      $this->property = $property;
      $this->country = $country;
    }

}

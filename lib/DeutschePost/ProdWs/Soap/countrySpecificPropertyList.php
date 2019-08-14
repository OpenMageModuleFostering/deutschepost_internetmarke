<?php

namespace DeutschePost\ProdWs\Soap;

class countrySpecificPropertyList
{

    /**
     * @var countrySpecificPropertyType $countrySpecificProperty
     * @access public
     */
    public $countrySpecificProperty = null;

    /**
     * @param countrySpecificPropertyType $countrySpecificProperty
     * @access public
     */
    public function __construct($countrySpecificProperty)
    {
      $this->countrySpecificProperty = $countrySpecificProperty;
    }

}

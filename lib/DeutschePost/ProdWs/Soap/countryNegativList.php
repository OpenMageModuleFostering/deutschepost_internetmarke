<?php

namespace DeutschePost\ProdWs\Soap;

class countryNegativList
{

    /**
     * @var countryType $country
     * @access public
     */
    public $country = null;

    /**
     * @param countryType $country
     * @access public
     */
    public function __construct($country)
    {
      $this->country = $country;
    }

}

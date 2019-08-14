<?php

namespace DeutschePost\ProdWs\Soap;

class countryList
{

    /**
     * @var logicalOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var string_maxLen10 $country_ISOCode
     * @access public
     */
    public $country_ISOCode = null;

    /**
     * @param logicalOperatorType $operator
     * @param string_maxLen10 $country_ISOCode
     * @access public
     */
    public function __construct($operator, $country_ISOCode)
    {
      $this->operator = $operator;
      $this->country_ISOCode = $country_ISOCode;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class countryGroupList
{

    /**
     * @var logicalOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var string_maxLen10 $countryGroup_shortName
     * @access public
     */
    public $countryGroup_shortName = null;

    /**
     * @param logicalOperatorType $operator
     * @param string_maxLen10 $countryGroup_shortName
     * @access public
     */
    public function __construct($operator, $countryGroup_shortName)
    {
      $this->operator = $operator;
      $this->countryGroup_shortName = $countryGroup_shortName;
    }

}

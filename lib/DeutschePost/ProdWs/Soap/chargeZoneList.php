<?php

namespace DeutschePost\ProdWs\Soap;

class chargeZoneList
{

    /**
     * @var logicalOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var string_maxLen10 $chargeZone_shortName
     * @access public
     */
    public $chargeZone_shortName = null;

    /**
     * @param logicalOperatorType $operator
     * @param string_maxLen10 $chargeZone_shortName
     * @access public
     */
    public function __construct($operator, $chargeZone_shortName)
    {
      $this->operator = $operator;
      $this->chargeZone_shortName = $chargeZone_shortName;
    }

}

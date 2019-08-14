<?php

namespace DeutschePost\ProdWs\Soap;

class productStampType
{

    /**
     * @var logicalOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var string_maxLen50 $stampType_name
     * @access public
     */
    public $stampType_name = null;

    /**
     * @param logicalOperatorType $operator
     * @param string_maxLen50 $stampType_name
     * @access public
     */
    public function __construct($operator, $stampType_name)
    {
      $this->operator = $operator;
      $this->stampType_name = $stampType_name;
    }

}

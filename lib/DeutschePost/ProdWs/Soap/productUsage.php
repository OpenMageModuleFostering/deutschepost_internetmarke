<?php

namespace DeutschePost\ProdWs\Soap;

class productUsage
{

    /**
     * @var logicalOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var string_maxLen50 $usage_name
     * @access public
     */
    public $usage_name = null;

    /**
     * @param logicalOperatorType $operator
     * @param string_maxLen50 $usage_name
     * @access public
     */
    public function __construct($operator, $usage_name)
    {
      $this->operator = $operator;
      $this->usage_name = $usage_name;
    }

}

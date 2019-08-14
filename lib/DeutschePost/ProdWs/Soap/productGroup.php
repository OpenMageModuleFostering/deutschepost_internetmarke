<?php

namespace DeutschePost\ProdWs\Soap;

class productGroup
{

    /**
     * @var logicalOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var string_maxLen50 $group_name
     * @access public
     */
    public $group_name = null;

    /**
     * @param logicalOperatorType $operator
     * @param string_maxLen50 $group_name
     * @access public
     */
    public function __construct($operator, $group_name)
    {
      $this->operator = $operator;
      $this->group_name = $group_name;
    }

}

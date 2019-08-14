<?php

namespace DeutschePost\ProdWs\Soap;

class productName
{

    /**
     * @var alphanumericOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var string_maxLen250 $name
     * @access public
     */
    public $name = null;

    /**
     * @param alphanumericOperatorType $operator
     * @param string_maxLen250 $name
     * @access public
     */
    public function __construct($operator, $name)
    {
      $this->operator = $operator;
      $this->name = $name;
    }

}

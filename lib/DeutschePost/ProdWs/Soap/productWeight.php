<?php

namespace DeutschePost\ProdWs\Soap;

class productWeight
{

    /**
     * @var numericOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var weightType $weight1
     * @access public
     */
    public $weight1 = null;

    /**
     * @var weightType $weight2
     * @access public
     */
    public $weight2 = null;

    /**
     * @param numericOperatorType $operator
     * @param weightType $weight1
     * @param weightType $weight2
     * @access public
     */
    public function __construct($operator, $weight1, $weight2)
    {
      $this->operator = $operator;
      $this->weight1 = $weight1;
      $this->weight2 = $weight2;
    }

}

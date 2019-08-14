<?php

namespace DeutschePost\ProdWs\Soap;

class dimension
{

    /**
     * @var numericOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var dimensionType $dimension1
     * @access public
     */
    public $dimension1 = null;

    /**
     * @var dimensionType $dimension2
     * @access public
     */
    public $dimension2 = null;

    /**
     * @param numericOperatorType $operator
     * @param dimensionType $dimension1
     * @param dimensionType $dimension2
     * @access public
     */
    public function __construct($operator, $dimension1, $dimension2)
    {
      $this->operator = $operator;
      $this->dimension1 = $dimension1;
      $this->dimension2 = $dimension2;
    }

}

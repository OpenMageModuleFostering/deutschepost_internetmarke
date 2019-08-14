<?php

namespace DeutschePost\ProdWs\Soap;

class productPrice
{

    /**
     * @var numericOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var currencyAmountType $price1
     * @access public
     */
    public $price1 = null;

    /**
     * @var currencyAmountType $price2
     * @access public
     */
    public $price2 = null;

    /**
     * @param numericOperatorType $operator
     * @param currencyAmountType $price1
     * @param currencyAmountType $price2
     * @access public
     */
    public function __construct($operator, $price1, $price2)
    {
      $this->operator = $operator;
      $this->price1 = $price1;
      $this->price2 = $price2;
    }

}

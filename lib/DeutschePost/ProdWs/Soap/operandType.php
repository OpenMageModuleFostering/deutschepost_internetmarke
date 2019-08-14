<?php

namespace DeutschePost\ProdWs\Soap;

class operandType
{

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var int $quantity
     * @access public
     */
    public $quantity = null;

    /**
     * @var weightType $weight
     * @access public
     */
    public $weight = null;

    /**
     * @var priceOperandType $price
     * @access public
     */
    public $price = null;

    /**
     * @var string_maxLen1000 $description
     * @access public
     */
    public $description = null;

    /**
     * @param string_maxLen50 $name
     * @param int $quantity
     * @param weightType $weight
     * @param priceOperandType $price
     * @param string_maxLen1000 $description
     * @access public
     */
    public function __construct($name, $quantity, $weight, $price, $description)
    {
      $this->name = $name;
      $this->quantity = $quantity;
      $this->weight = $weight;
      $this->price = $price;
      $this->description = $description;
    }

}

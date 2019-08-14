<?php

namespace DeutschePost\ProdWs\Soap;

class productCategory
{

    /**
     * @var logicalOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var string_maxLen50 $category_name
     * @access public
     */
    public $category_name = null;

    /**
     * @param logicalOperatorType $operator
     * @param string_maxLen50 $category_name
     * @access public
     */
    public function __construct($operator, $category_name)
    {
      $this->operator = $operator;
      $this->category_name = $category_name;
    }

}

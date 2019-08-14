<?php

namespace DeutschePost\ProdWs\Soap;

class productID
{

    /**
     * @var alphanumericOperatorType $operator
     * @access public
     */
    public $operator = null;

    /**
     * @var string_maxLen50 $id
     * @access public
     */
    public $id = null;

    /**
     * @var string_maxLen50 $source
     * @access public
     */
    public $source = null;

    /**
     * @param alphanumericOperatorType $operator
     * @param string_maxLen50 $id
     * @param string_maxLen50 $source
     * @access public
     */
    public function __construct($operator, $id, $source)
    {
      $this->operator = $operator;
      $this->id = $id;
      $this->source = $source;
    }

}

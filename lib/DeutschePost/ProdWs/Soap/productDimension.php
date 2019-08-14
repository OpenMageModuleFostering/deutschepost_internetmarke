<?php

namespace DeutschePost\ProdWs\Soap;

class productDimension
{

    /**
     * @var name $name
     * @access public
     */
    public $name = null;

    /**
     * @var dimension $dimension
     * @access public
     */
    public $dimension = null;

    /**
     * @param name $name
     * @param dimension $dimension
     * @access public
     */
    public function __construct($name, $dimension)
    {
      $this->name = $name;
      $this->dimension = $dimension;
    }

}

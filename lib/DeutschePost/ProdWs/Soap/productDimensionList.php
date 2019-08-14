<?php

namespace DeutschePost\ProdWs\Soap;

class productDimensionList
{

    /**
     * @var productDimension $productDimension
     * @access public
     */
    public $productDimension = null;

    /**
     * @param productDimension $productDimension
     * @access public
     */
    public function __construct($productDimension)
    {
      $this->productDimension = $productDimension;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class salesProductList
{

    /**
     * @var salesProductType $SalesProduct
     * @access public
     */
    public $SalesProduct = null;

    /**
     * @param salesProductType $SalesProduct
     * @access public
     */
    public function __construct($SalesProduct)
    {
      $this->SalesProduct = $SalesProduct;
    }

}

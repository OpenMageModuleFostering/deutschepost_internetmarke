<?php

namespace DeutschePost\ProdWs\Soap;

class basicProductList
{

    /**
     * @var basicProductType $BasicProduct
     * @access public
     */
    public $BasicProduct = null;

    /**
     * @param basicProductType $BasicProduct
     * @access public
     */
    public function __construct($BasicProduct)
    {
      $this->BasicProduct = $BasicProduct;
    }

}

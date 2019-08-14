<?php

namespace DeutschePost\ProdWs\Soap;

class shortSalesProductList
{

    /**
     * @var shortSalesProductType $ShortSalesProduct
     * @access public
     */
    public $ShortSalesProduct = null;

    /**
     * @param shortSalesProductType $ShortSalesProduct
     * @access public
     */
    public function __construct($ShortSalesProduct)
    {
      $this->ShortSalesProduct = $ShortSalesProduct;
    }

}

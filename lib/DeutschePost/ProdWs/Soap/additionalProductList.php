<?php

namespace DeutschePost\ProdWs\Soap;

class additionalProductList
{

    /**
     * @var additionalProductType $AdditionalProduct
     * @access public
     */
    public $AdditionalProduct = null;

    /**
     * @param additionalProductType $AdditionalProduct
     * @access public
     */
    public function __construct($AdditionalProduct)
    {
      $this->AdditionalProduct = $AdditionalProduct;
    }

}

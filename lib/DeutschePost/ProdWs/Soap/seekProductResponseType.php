<?php

namespace DeutschePost\ProdWs\Soap;

class seekProductResponseType
{

    /**
     * @var salesProduct[] $salesProduct
     * @access public
     */
    public $salesProduct = null;

    /**
     * @var string_maxLen1000 $message
     * @access public
     */
    public $message = null;

    /**
     * @param salesProduct[] $salesProduct
     * @param string_maxLen1000 $message
     * @access public
     */
    public function __construct($salesProduct, $message)
    {
      $this->salesProduct = $salesProduct;
      $this->message = $message;
    }

}

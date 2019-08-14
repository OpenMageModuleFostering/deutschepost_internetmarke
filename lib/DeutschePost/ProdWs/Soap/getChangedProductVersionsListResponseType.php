<?php

namespace DeutschePost\ProdWs\Soap;

class getChangedProductVersionsListResponseType
{

    /**
     * @var salesProductList $salesProductList
     * @access public
     */
    public $salesProductList = null;

    /**
     * @var basicProductList $basicProductList
     * @access public
     */
    public $basicProductList = null;

    /**
     * @var additionalProductList $additionalProductList
     * @access public
     */
    public $additionalProductList = null;

    /**
     * @var specialServiceList $specialServiceList
     * @access public
     */
    public $specialServiceList = null;

    /**
     * @var string_maxLen1000 $message
     * @access public
     */
    public $message = null;

    /**
     * @param salesProductList $salesProductList
     * @param basicProductList $basicProductList
     * @param additionalProductList $additionalProductList
     * @param specialServiceList $specialServiceList
     * @param string_maxLen1000 $message
     * @access public
     */
    public function __construct($salesProductList, $basicProductList, $additionalProductList, $specialServiceList, $message)
    {
      $this->salesProductList = $salesProductList;
      $this->basicProductList = $basicProductList;
      $this->additionalProductList = $additionalProductList;
      $this->specialServiceList = $specialServiceList;
      $this->message = $message;
    }

}

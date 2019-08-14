<?php

namespace DeutschePost\ProdWs\Soap;

class getProductRequestType
{

    /**
     * @var string_maxLen20 $mandantID
     * @access public
     */
    public $mandantID = null;

    /**
     * @var string_maxLen20 $subMandantID
     * @access public
     */
    public $subMandantID = null;

    /**
     * @var string_maxLen50 $ProdWSID
     * @access public
     */
    public $ProdWSID = null;

    /**
     * @var timestampType $timestamp
     * @access public
     */
    public $timestamp = null;

    /**
     * @var boolean $dedicatedProducts
     * @access public
     */
    public $dedicatedProducts = null;

    /**
     * @var int $responseMode
     * @access public
     */
    public $responseMode = null;

    /**
     * @param string_maxLen20 $mandantID
     * @param string_maxLen20 $subMandantID
     * @param string_maxLen50 $ProdWSID
     * @param timestampType $timestamp
     * @param boolean $dedicatedProducts
     * @param int $responseMode
     * @access public
     */
    public function __construct($mandantID, $subMandantID, $ProdWSID, $timestamp, $dedicatedProducts, $responseMode)
    {
      $this->mandantID = $mandantID;
      $this->subMandantID = $subMandantID;
      $this->ProdWSID = $ProdWSID;
      $this->timestamp = $timestamp;
      $this->dedicatedProducts = $dedicatedProducts;
      $this->responseMode = $responseMode;
    }

}

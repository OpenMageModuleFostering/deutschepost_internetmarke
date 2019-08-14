<?php

namespace DeutschePost\ProdWs\Soap;

class getProductListRequestType
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
     * @var boolean $onlyChanges
     * @access public
     */
    public $onlyChanges = null;

    /**
     * @var date $referenceDate
     * @access public
     */
    public $referenceDate = null;

    /**
     * @var boolean $shortList
     * @access public
     */
    public $shortList = null;

    /**
     * @param string_maxLen20 $mandantID
     * @param string_maxLen20 $subMandantID
     * @param timestampType $timestamp
     * @param boolean $dedicatedProducts
     * @param int $responseMode
     * @param boolean $onlyChanges
     * @param date $referenceDate
     * @param boolean $shortList
     * @access public
     */
    public function __construct($mandantID, $subMandantID, $timestamp, $dedicatedProducts, $responseMode, $onlyChanges, $referenceDate, $shortList)
    {
      $this->mandantID = $mandantID;
      $this->subMandantID = $subMandantID;
      $this->timestamp = $timestamp;
      $this->dedicatedProducts = $dedicatedProducts;
      $this->responseMode = $responseMode;
      $this->onlyChanges = $onlyChanges;
      $this->referenceDate = $referenceDate;
      $this->shortList = $shortList;
    }

}

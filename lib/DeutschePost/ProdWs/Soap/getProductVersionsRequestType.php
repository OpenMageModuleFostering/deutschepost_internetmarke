<?php

namespace DeutschePost\ProdWs\Soap;

class getProductVersionsRequestType
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
     * @param string_maxLen50 $ProdWSID
     * @param boolean $dedicatedProducts
     * @param int $responseMode
     * @param boolean $onlyChanges
     * @param date $referenceDate
     * @param boolean $shortList
     * @access public
     */
    public function __construct($mandantID, $subMandantID, $ProdWSID, $dedicatedProducts, $responseMode, $onlyChanges, $referenceDate, $shortList)
    {
      $this->mandantID = $mandantID;
      $this->subMandantID = $subMandantID;
      $this->ProdWSID = $ProdWSID;
      $this->dedicatedProducts = $dedicatedProducts;
      $this->responseMode = $responseMode;
      $this->onlyChanges = $onlyChanges;
      $this->referenceDate = $referenceDate;
      $this->shortList = $shortList;
    }

}

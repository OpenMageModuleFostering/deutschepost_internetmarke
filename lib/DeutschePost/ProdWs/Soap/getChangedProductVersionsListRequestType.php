<?php

namespace DeutschePost\ProdWs\Soap;

class getChangedProductVersionsListRequestType
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
     * @param boolean $dedicatedProducts
     * @param int $responseMode
     * @access public
     */
    public function __construct($mandantID, $subMandantID, $dedicatedProducts, $responseMode)
    {
      $this->mandantID = $mandantID;
      $this->subMandantID = $subMandantID;
      $this->dedicatedProducts = $dedicatedProducts;
      $this->responseMode = $responseMode;
    }

}

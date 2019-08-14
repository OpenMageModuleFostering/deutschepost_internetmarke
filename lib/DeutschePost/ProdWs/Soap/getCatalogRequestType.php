<?php

namespace DeutschePost\ProdWs\Soap;

class getCatalogRequestType
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
     * @var string_maxLen50 $catalogName
     * @access public
     */
    public $catalogName = null;

    /**
     * @param string_maxLen20 $mandantID
     * @param string_maxLen20 $subMandantID
     * @param string_maxLen50 $catalogName
     * @access public
     */
    public function __construct($mandantID, $subMandantID, $catalogName)
    {
      $this->mandantID = $mandantID;
      $this->subMandantID = $subMandantID;
      $this->catalogName = $catalogName;
    }

}

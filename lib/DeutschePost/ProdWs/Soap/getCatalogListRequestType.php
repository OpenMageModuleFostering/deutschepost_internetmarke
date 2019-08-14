<?php

namespace DeutschePost\ProdWs\Soap;

class getCatalogListRequestType
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
     * @var boolean $catalogProperties
     * @access public
     */
    public $catalogProperties = null;

    /**
     * @param string_maxLen20 $mandantID
     * @param string_maxLen20 $subMandantID
     * @param boolean $catalogProperties
     * @access public
     */
    public function __construct($mandantID, $subMandantID, $catalogProperties)
    {
      $this->mandantID = $mandantID;
      $this->subMandantID = $subMandantID;
      $this->catalogProperties = $catalogProperties;
    }

}

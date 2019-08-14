<?php

namespace DeutschePost\ProdWs\Soap;

class subMandant
{

    /**
     * @var string_maxLen20 $subMandantID
     * @access public
     */
    public $subMandantID = null;

    /**
     * @var string_maxLen50 $subMandantName
     * @access public
     */
    public $subMandantName = null;

    /**
     * @var anyURI $url
     * @access public
     */
    public $url = null;

    /**
     * @param string_maxLen20 $subMandantID
     * @param string_maxLen50 $subMandantName
     * @param anyURI $url
     * @access public
     */
    public function __construct($subMandantID, $subMandantName, $url)
    {
      $this->subMandantID = $subMandantID;
      $this->subMandantName = $subMandantName;
      $this->url = $url;
    }

}

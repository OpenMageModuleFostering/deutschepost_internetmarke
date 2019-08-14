<?php

namespace DeutschePost\ProdWs\Soap;

class seekProductRequestType
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
     * @var searchParameterList $searchParameterList
     * @access public
     */
    public $searchParameterList = null;

    /**
     * @param string_maxLen20 $mandantID
     * @param string_maxLen20 $subMandantID
     * @param searchParameterList $searchParameterList
     * @access public
     */
    public function __construct($mandantID, $subMandantID, $searchParameterList)
    {
      $this->mandantID = $mandantID;
      $this->subMandantID = $subMandantID;
      $this->searchParameterList = $searchParameterList;
    }

}

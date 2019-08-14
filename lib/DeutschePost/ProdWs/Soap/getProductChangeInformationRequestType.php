<?php

namespace DeutschePost\ProdWs\Soap;

class getProductChangeInformationRequestType
{

    /**
     * @var string_maxLen20 $mandantID
     * @access public
     */
    public $mandantID = null;

    /**
     * @var string_maxLen20 $submandantID
     * @access public
     */
    public $submandantID = null;

    /**
     * @var timestampType $lastQueryDate
     * @access public
     */
    public $lastQueryDate = null;

    /**
     * @param string_maxLen20 $mandantID
     * @param string_maxLen20 $submandantID
     * @param timestampType $lastQueryDate
     * @access public
     */
    public function __construct($mandantID, $submandantID, $lastQueryDate)
    {
      $this->mandantID = $mandantID;
      $this->submandantID = $submandantID;
      $this->lastQueryDate = $lastQueryDate;
    }

}

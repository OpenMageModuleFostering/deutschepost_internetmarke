<?php

namespace DeutschePost\ProdWs\Soap;

class registerNotificationRequestType
{

    /**
     * @var string_maxLen20 $mandantID
     * @access public
     */
    public $mandantID = null;

    /**
     * @var subMandant $subMandant
     * @access public
     */
    public $subMandant = null;

    /**
     * @var anyURI $url
     * @access public
     */
    public $url = null;

    /**
     * @param string_maxLen20 $mandantID
     * @param subMandant $subMandant
     * @param anyURI $url
     * @access public
     */
    public function __construct($mandantID, $subMandant, $url)
    {
      $this->mandantID = $mandantID;
      $this->subMandant = $subMandant;
      $this->url = $url;
    }

}

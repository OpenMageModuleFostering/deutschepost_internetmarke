<?php

namespace DeutschePost\ProdWs\Soap;

class registerEMailAdressResponseType
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
     * @var boolean $registration
     * @access public
     */
    public $registration = null;

    /**
     * @var dateTime $registrationDateTime
     * @access public
     */
    public $registrationDateTime = null;

    /**
     * @var string_maxLen1000 $message
     * @access public
     */
    public $message = null;

    /**
     * @param string_maxLen20 $mandantID
     * @param string_maxLen20 $subMandantID
     * @param boolean $registration
     * @param dateTime $registrationDateTime
     * @param string_maxLen1000 $message
     * @access public
     */
    public function __construct($mandantID, $subMandantID, $registration, $registrationDateTime, $message)
    {
      $this->mandantID = $mandantID;
      $this->subMandantID = $subMandantID;
      $this->registration = $registration;
      $this->registrationDateTime = $registrationDateTime;
      $this->message = $message;
    }

}

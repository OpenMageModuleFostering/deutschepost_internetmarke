<?php

namespace DeutschePost\ProdWs\Soap;

class registerEMailAdressRequestType
{

    /**
     * @var string_maxLen20 $mandantID
     * @access public
     */
    public $mandantID = null;

    /**
     * @var anyURI $eMailAdress
     * @access public
     */
    public $eMailAdress = null;

    /**
     * @var subMandant $subMandant
     * @access public
     */
    public $subMandant = null;

    /**
     * @var boolean $overwrite
     * @access public
     */
    public $overwrite = null;

    /**
     * @param string_maxLen20 $mandantID
     * @param anyURI $eMailAdress
     * @param subMandant $subMandant
     * @param boolean $overwrite
     * @access public
     */
    public function __construct($mandantID, $eMailAdress, $subMandant, $overwrite)
    {
      $this->mandantID = $mandantID;
      $this->eMailAdress = $eMailAdress;
      $this->subMandant = $subMandant;
      $this->overwrite = $overwrite;
    }

}

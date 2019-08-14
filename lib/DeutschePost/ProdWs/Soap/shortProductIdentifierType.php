<?php

namespace DeutschePost\ProdWs\Soap;

class shortProductIdentifierType
{

    /**
     * @var string_maxLen50 $ProdWSID
     * @access public
     */
    public $ProdWSID = null;

    /**
     * @var string_maxLen250 $name
     * @access public
     */
    public $name = null;

    /**
     * @var dateTime $validFrom
     * @access public
     */
    public $validFrom = null;

    /**
     * @var dateTime $validTo
     * @access public
     */
    public $validTo = null;

    /**
     * @var int $version
     * @access public
     */
    public $version = null;

    /**
     * @param string_maxLen50 $ProdWSID
     * @param string_maxLen250 $name
     * @param dateTime $validFrom
     * @param dateTime $validTo
     * @param int $version
     * @access public
     */
    public function __construct($ProdWSID, $name, $validFrom, $validTo, $version)
    {
      $this->ProdWSID = $ProdWSID;
      $this->name = $name;
      $this->validFrom = $validFrom;
      $this->validTo = $validTo;
      $this->version = $version;
    }

}

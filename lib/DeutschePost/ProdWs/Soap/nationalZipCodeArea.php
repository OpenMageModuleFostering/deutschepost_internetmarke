<?php

namespace DeutschePost\ProdWs\Soap;

class nationalZipCodeArea
{

    /**
     * @var nationalZipCodeType $firstZipCode
     * @access public
     */
    public $firstZipCode = null;

    /**
     * @var nationalZipCodeType $lastZipCode
     * @access public
     */
    public $lastZipCode = null;

    /**
     * @param nationalZipCodeType $firstZipCode
     * @param nationalZipCodeType $lastZipCode
     * @access public
     */
    public function __construct($firstZipCode, $lastZipCode)
    {
      $this->firstZipCode = $firstZipCode;
      $this->lastZipCode = $lastZipCode;
    }

}

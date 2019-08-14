<?php

namespace DeutschePost\ProdWs\Soap;

class validityType
{

    /**
     * @var timestampType $validFrom
     * @access public
     */
    public $validFrom = null;

    /**
     * @var timestampType $validTo
     * @access public
     */
    public $validTo = null;

    /**
     * @param timestampType $validFrom
     * @param timestampType $validTo
     * @access public
     */
    public function __construct($validFrom, $validTo)
    {
      $this->validFrom = $validFrom;
      $this->validTo = $validTo;
    }

}

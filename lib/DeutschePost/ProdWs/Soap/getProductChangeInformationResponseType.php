<?php

namespace DeutschePost\ProdWs\Soap;

class getProductChangeInformationResponseType
{

    /**
     * @var boolean $changesAvailable
     * @access public
     */
    public $changesAvailable = null;

    /**
     * @var timestampType $providingDate
     * @access public
     */
    public $providingDate = null;

    /**
     * @param boolean $changesAvailable
     * @param timestampType $providingDate
     * @access public
     */
    public function __construct($changesAvailable, $providingDate)
    {
      $this->changesAvailable = $changesAvailable;
      $this->providingDate = $providingDate;
    }

}

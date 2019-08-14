<?php

namespace DeutschePost\ProdWs\Soap;

class accountServiceReferenceList
{

    /**
     * @var accountProdReferenceType $accountServiceReference
     * @access public
     */
    public $accountServiceReference = null;

    /**
     * @param accountProdReferenceType $accountServiceReference
     * @access public
     */
    public function __construct($accountServiceReference)
    {
      $this->accountServiceReference = $accountServiceReference;
    }

}

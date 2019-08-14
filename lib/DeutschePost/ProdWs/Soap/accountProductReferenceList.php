<?php

namespace DeutschePost\ProdWs\Soap;

class accountProductReferenceList
{

    /**
     * @var accountProdReferenceType $accountProductReference
     * @access public
     */
    public $accountProductReference = null;

    /**
     * @param accountProdReferenceType $accountProductReference
     * @access public
     */
    public function __construct($accountProductReference)
    {
      $this->accountProductReference = $accountProductReference;
    }

}

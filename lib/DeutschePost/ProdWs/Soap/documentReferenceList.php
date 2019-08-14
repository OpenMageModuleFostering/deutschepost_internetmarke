<?php

namespace DeutschePost\ProdWs\Soap;

class documentReferenceList
{

    /**
     * @var documentReferenceType $documentReference
     * @access public
     */
    public $documentReference = null;

    /**
     * @param documentReferenceType $documentReference
     * @access public
     */
    public function __construct($documentReference)
    {
      $this->documentReference = $documentReference;
    }

}

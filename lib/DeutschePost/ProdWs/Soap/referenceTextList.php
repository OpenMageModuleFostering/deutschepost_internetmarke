<?php

namespace DeutschePost\ProdWs\Soap;

class referenceTextList
{

    /**
     * @var formatedTextType $referenceText
     * @access public
     */
    public $referenceText = null;

    /**
     * @param formatedTextType $referenceText
     * @access public
     */
    public function __construct($referenceText)
    {
      $this->referenceText = $referenceText;
    }

}

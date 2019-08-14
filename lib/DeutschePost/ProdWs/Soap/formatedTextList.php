<?php

namespace DeutschePost\ProdWs\Soap;

class formatedTextList
{

    /**
     * @var formatedTextType $formatedText
     * @access public
     */
    public $formatedText = null;

    /**
     * @param formatedTextType $formatedText
     * @access public
     */
    public function __construct($formatedText)
    {
      $this->formatedText = $formatedText;
    }

}

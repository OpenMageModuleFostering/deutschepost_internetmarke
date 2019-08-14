<?php

namespace DeutschePost\ProdWs\Soap;

class textRowType
{

    /**
     * @var textBlockType[] $textBlock
     * @access public
     */
    public $textBlock = null;

    /**
     * @param textBlockType[] $textBlock
     * @access public
     */
    public function __construct($textBlock)
    {
      $this->textBlock = $textBlock;
    }

}

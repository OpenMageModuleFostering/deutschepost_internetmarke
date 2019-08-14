<?php

namespace DeutschePost\ProdWs\Soap;

class formatedTextType
{

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var textRowType[] $textRow
     * @access public
     */
    public $textRow = null;

    /**
     * @param string_maxLen50 $name
     * @param textRowType[] $textRow
     * @access public
     */
    public function __construct($name, $textRow)
    {
      $this->name = $name;
      $this->textRow = $textRow;
    }

}

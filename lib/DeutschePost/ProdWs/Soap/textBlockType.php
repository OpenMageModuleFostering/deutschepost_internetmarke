<?php

namespace DeutschePost\ProdWs\Soap;

class textBlockType
{

    /**
     * @var string_maxLen50 $font
     * @access public
     */
    public $font = null;

    /**
     * @var float $size
     * @access public
     */
    public $size = null;

    /**
     * @var string_maxLen50 $style
     * @access public
     */
    public $style = null;

    /**
     * @var boolean $underline
     * @access public
     */
    public $underline = null;

    /**
     * @var string_maxLen100 $text
     * @access public
     */
    public $text = null;

    /**
     * @param string_maxLen50 $font
     * @param float $size
     * @param string_maxLen50 $style
     * @param boolean $underline
     * @param string_maxLen100 $text
     * @access public
     */
    public function __construct($font, $size, $style, $underline, $text)
    {
      $this->font = $font;
      $this->size = $size;
      $this->style = $style;
      $this->underline = $underline;
      $this->text = $text;
    }

}

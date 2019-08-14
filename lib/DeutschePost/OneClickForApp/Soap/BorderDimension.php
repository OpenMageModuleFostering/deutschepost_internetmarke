<?php

namespace DeutschePost\OneClickForApp\Soap;

class BorderDimension
{

    /**
     * @var float $top
     * @access public
     */
    public $top = null;

    /**
     * @var float $bottom
     * @access public
     */
    public $bottom = null;

    /**
     * @var float $left
     * @access public
     */
    public $left = null;

    /**
     * @var float $right
     * @access public
     */
    public $right = null;

    /**
     * @param float $top
     * @param float $bottom
     * @param float $left
     * @param float $right
     * @access public
     */
    public function __construct($top, $bottom, $left, $right)
    {
      $this->top = $top;
      $this->bottom = $bottom;
      $this->left = $left;
      $this->right = $right;
    }

}

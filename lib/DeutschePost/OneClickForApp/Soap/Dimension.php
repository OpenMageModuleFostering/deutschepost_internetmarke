<?php

namespace DeutschePost\OneClickForApp\Soap;

class Dimension
{

    /**
     * @var float $x
     * @access public
     */
    public $x = null;

    /**
     * @var float $y
     * @access public
     */
    public $y = null;

    /**
     * @param float $x
     * @param float $y
     * @access public
     */
    public function __construct($x, $y)
    {
      $this->x = $x;
      $this->y = $y;
    }

}

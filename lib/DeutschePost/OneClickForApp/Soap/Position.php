<?php

namespace DeutschePost\OneClickForApp\Soap;

class Position
{

    /**
     * @var int $labelX
     * @access public
     */
    public $labelX = null;

    /**
     * @var int $labelY
     * @access public
     */
    public $labelY = null;

    /**
     * @param int $labelX
     * @param int $labelY
     * @access public
     */
    public function __construct($labelX, $labelY)
    {
      $this->labelX = $labelX;
      $this->labelY = $labelY;
    }

}

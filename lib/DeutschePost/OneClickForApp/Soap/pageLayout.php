<?php

namespace DeutschePost\OneClickForApp\Soap;

class pageLayout
{

    /**
     * @var Dimension $size
     * @access public
     */
    public $size = null;

    /**
     * @var Orientation $orientation
     * @access public
     */
    public $orientation = null;

    /**
     * @var Dimension $labelSpacing
     * @access public
     */
    public $labelSpacing = null;

    /**
     * @var Position $labelCount
     * @access public
     */
    public $labelCount = null;

    /**
     * @var BorderDimension $margin
     * @access public
     */
    public $margin = null;

    /**
     * @param Dimension $size
     * @param Orientation $orientation
     * @param Dimension $labelSpacing
     * @param Position $labelCount
     * @param BorderDimension $margin
     * @access public
     */
    public function __construct($size, $orientation, $labelSpacing, $labelCount, $margin)
    {
      $this->size = $size;
      $this->orientation = $orientation;
      $this->labelSpacing = $labelSpacing;
      $this->labelCount = $labelCount;
      $this->margin = $margin;
    }

}

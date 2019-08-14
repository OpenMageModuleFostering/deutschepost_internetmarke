<?php

namespace DeutschePost\ProdWs\Soap;

class dimensionList
{

    /**
     * @var numericValueType $length
     * @access public
     */
    public $length = null;

    /**
     * @var numericValueType $width
     * @access public
     */
    public $width = null;

    /**
     * @var numericValueType $height
     * @access public
     */
    public $height = null;

    /**
     * @var numericValueType $diameter
     * @access public
     */
    public $diameter = null;

    /**
     * @var numericValueType $girth
     * @access public
     */
    public $girth = null;

    /**
     * @var numericValueType $addedEdgeLength
     * @access public
     */
    public $addedEdgeLength = null;

    /**
     * @param numericValueType $length
     * @param numericValueType $width
     * @param numericValueType $height
     * @param numericValueType $diameter
     * @param numericValueType $girth
     * @param numericValueType $addedEdgeLength
     * @access public
     */
    public function __construct($length, $width, $height, $diameter, $girth, $addedEdgeLength)
    {
      $this->length = $length;
      $this->width = $width;
      $this->height = $height;
      $this->diameter = $diameter;
      $this->girth = $girth;
      $this->addedEdgeLength = $addedEdgeLength;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class shortSalesProductType
{

    /**
     * @var string_maxLen50 $ProdWSID
     * @access public
     */
    public $ProdWSID = null;

    /**
     * @var externIdentifierType $externIdentifier
     * @access public
     */
    public $externIdentifier = null;

    /**
     * @var string_maxLen250 $name
     * @access public
     */
    public $name = null;

    /**
     * @var destination $destination
     * @access public
     */
    public $destination = null;

    /**
     * @var dateTime $validFrom
     * @access public
     */
    public $validFrom = null;

    /**
     * @var dateTime $validTo
     * @access public
     */
    public $validTo = null;

    /**
     * @var priceDefinition $priceDefinition
     * @access public
     */
    public $priceDefinition = null;

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
     * @var numericValueType $weight
     * @access public
     */
    public $weight = null;

    /**
     * @param string_maxLen50 $ProdWSID
     * @param externIdentifierType $externIdentifier
     * @param string_maxLen250 $name
     * @param destination $destination
     * @param dateTime $validFrom
     * @param dateTime $validTo
     * @param priceDefinition $priceDefinition
     * @param numericValueType $length
     * @param numericValueType $width
     * @param numericValueType $height
     * @param numericValueType $diameter
     * @param numericValueType $girth
     * @param numericValueType $addedEdgeLength
     * @param numericValueType $weight
     * @access public
     */
    public function __construct($ProdWSID, $externIdentifier, $name, $destination, $validFrom, $validTo, $priceDefinition, $length, $width, $height, $diameter, $girth, $addedEdgeLength, $weight)
    {
      $this->ProdWSID = $ProdWSID;
      $this->externIdentifier = $externIdentifier;
      $this->name = $name;
      $this->destination = $destination;
      $this->validFrom = $validFrom;
      $this->validTo = $validTo;
      $this->priceDefinition = $priceDefinition;
      $this->length = $length;
      $this->width = $width;
      $this->height = $height;
      $this->diameter = $diameter;
      $this->girth = $girth;
      $this->addedEdgeLength = $addedEdgeLength;
      $this->weight = $weight;
    }

}

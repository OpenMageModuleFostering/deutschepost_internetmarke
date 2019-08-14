<?php

namespace DeutschePost\ProdWs\Soap;

class groupedPropertyType
{

    /**
     * @var propertyList $propertyList
     * @access public
     */
    public $propertyList = null;

    /**
     * @var unitPriceType $price
     * @access public
     */
    public $price = null;

    /**
     * @var documentReferenceList $documentReferenceList
     * @access public
     */
    public $documentReferenceList = null;

    /**
     * @var formatedTextList $formatedTextList
     * @access public
     */
    public $formatedTextList = null;

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var string_maxLen20 $shortName
     * @access public
     */
    public $shortName = null;

    /**
     * @var string_maxLen1000 $description
     * @access public
     */
    public $description = null;

    /**
     * @var string_maxLen1000 $annotation
     * @access public
     */
    public $annotation = null;

    /**
     * @param propertyList $propertyList
     * @param unitPriceType $price
     * @param documentReferenceList $documentReferenceList
     * @param formatedTextList $formatedTextList
     * @param string_maxLen50 $name
     * @param string_maxLen20 $shortName
     * @param string_maxLen1000 $description
     * @param string_maxLen1000 $annotation
     * @access public
     */
    public function __construct($propertyList, $price, $documentReferenceList, $formatedTextList, $name, $shortName, $description, $annotation)
    {
      $this->propertyList = $propertyList;
      $this->price = $price;
      $this->documentReferenceList = $documentReferenceList;
      $this->formatedTextList = $formatedTextList;
      $this->name = $name;
      $this->shortName = $shortName;
      $this->description = $description;
      $this->annotation = $annotation;
    }

}

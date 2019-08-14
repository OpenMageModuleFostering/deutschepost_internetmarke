<?php

namespace DeutschePost\ProdWs\Soap;

class additionalProductType
{

    /**
     * @var extendedIdentifierType $extendedIdentifier
     * @access public
     */
    public $extendedIdentifier = null;

    /**
     * @var unitPriceType $priceDefinition
     * @access public
     */
    public $priceDefinition = null;

    /**
     * @var slidingPriceListType $slidingPriceList
     * @access public
     */
    public $slidingPriceList = null;

    /**
     * @var propertyList $propertyList
     * @access public
     */
    public $propertyList = null;

    /**
     * @var groupedPropertyList $groupedPropertyList
     * @access public
     */
    public $groupedPropertyList = null;

    /**
     * @var destinationAreaType $destinationArea
     * @access public
     */
    public $destinationArea = null;

    /**
     * @var documentReferenceList $documentReferenceList
     * @access public
     */
    public $documentReferenceList = null;

    /**
     * @param extendedIdentifierType $extendedIdentifier
     * @param unitPriceType $priceDefinition
     * @param slidingPriceListType $slidingPriceList
     * @param propertyList $propertyList
     * @param groupedPropertyList $groupedPropertyList
     * @param destinationAreaType $destinationArea
     * @param documentReferenceList $documentReferenceList
     * @access public
     */
    public function __construct($extendedIdentifier, $priceDefinition, $slidingPriceList, $propertyList, $groupedPropertyList, $destinationArea, $documentReferenceList)
    {
      $this->extendedIdentifier = $extendedIdentifier;
      $this->priceDefinition = $priceDefinition;
      $this->slidingPriceList = $slidingPriceList;
      $this->propertyList = $propertyList;
      $this->groupedPropertyList = $groupedPropertyList;
      $this->destinationArea = $destinationArea;
      $this->documentReferenceList = $documentReferenceList;
    }

}

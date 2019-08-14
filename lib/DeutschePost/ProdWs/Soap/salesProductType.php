<?php

namespace DeutschePost\ProdWs\Soap;

class salesProductType
{

    /**
     * @var extendedIdentifierType $extendedIdentifier
     * @access public
     */
    public $extendedIdentifier = null;

    /**
     * @var priceDefinitionType $priceDefinition
     * @access public
     */
    public $priceDefinition = null;

    /**
     * @var dimensionList $dimensionList
     * @access public
     */
    public $dimensionList = null;

    /**
     * @var numericValueType $weight
     * @access public
     */
    public $weight = null;

    /**
     * @var propertyList $propertyList
     * @access public
     */
    public $propertyList = null;

    /**
     * @var countrySpecificPropertyList $countrySpecificPropertyList
     * @access public
     */
    public $countrySpecificPropertyList = null;

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
     * @var usageList $usageList
     * @access public
     */
    public $usageList = null;

    /**
     * @var categoryList $categoryList
     * @access public
     */
    public $categoryList = null;

    /**
     * @var stampTypeList $stampTypeList
     * @access public
     */
    public $stampTypeList = null;

    /**
     * @var documentReferenceList $documentReferenceList
     * @access public
     */
    public $documentReferenceList = null;

    /**
     * @var referenceTextList $referenceTextList
     * @access public
     */
    public $referenceTextList = null;

    /**
     * @var accountProductReferenceList $accountProductReferenceList
     * @access public
     */
    public $accountProductReferenceList = null;

    /**
     * @var accountServiceReferenceList $accountServiceReferenceList
     * @access public
     */
    public $accountServiceReferenceList = null;

    /**
     * @param extendedIdentifierType $extendedIdentifier
     * @param priceDefinitionType $priceDefinition
     * @param dimensionList $dimensionList
     * @param numericValueType $weight
     * @param propertyList $propertyList
     * @param countrySpecificPropertyList $countrySpecificPropertyList
     * @param groupedPropertyList $groupedPropertyList
     * @param destinationAreaType $destinationArea
     * @param usageList $usageList
     * @param categoryList $categoryList
     * @param stampTypeList $stampTypeList
     * @param documentReferenceList $documentReferenceList
     * @param referenceTextList $referenceTextList
     * @param accountProductReferenceList $accountProductReferenceList
     * @param accountServiceReferenceList $accountServiceReferenceList
     * @access public
     */
    public function __construct($extendedIdentifier, $priceDefinition, $dimensionList, $weight, $propertyList, $countrySpecificPropertyList, $groupedPropertyList, $destinationArea, $usageList, $categoryList, $stampTypeList, $documentReferenceList, $referenceTextList, $accountProductReferenceList, $accountServiceReferenceList)
    {
      $this->extendedIdentifier = $extendedIdentifier;
      $this->priceDefinition = $priceDefinition;
      $this->dimensionList = $dimensionList;
      $this->weight = $weight;
      $this->propertyList = $propertyList;
      $this->countrySpecificPropertyList = $countrySpecificPropertyList;
      $this->groupedPropertyList = $groupedPropertyList;
      $this->destinationArea = $destinationArea;
      $this->usageList = $usageList;
      $this->categoryList = $categoryList;
      $this->stampTypeList = $stampTypeList;
      $this->documentReferenceList = $documentReferenceList;
      $this->referenceTextList = $referenceTextList;
      $this->accountProductReferenceList = $accountProductReferenceList;
      $this->accountServiceReferenceList = $accountServiceReferenceList;
    }

}

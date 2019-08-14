<?php

namespace DeutschePost\ProdWs\Soap;

class specialServiceType
{

    /**
     * @var extendedIdentifierType $extendedIdentifier
     * @access public
     */
    public $extendedIdentifier = null;

    /**
     * @var string_maxLen1000 $condition
     * @access public
     */
    public $condition = null;

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
     * @var serviceDayList $serviceDayList
     * @access public
     */
    public $serviceDayList = null;

    /**
     * @var exclusionDayList $exclusionDayList
     * @access public
     */
    public $exclusionDayList = null;

    /**
     * @param extendedIdentifierType $extendedIdentifier
     * @param string_maxLen1000 $condition
     * @param unitPriceType $priceDefinition
     * @param slidingPriceListType $slidingPriceList
     * @param propertyList $propertyList
     * @param groupedPropertyList $groupedPropertyList
     * @param serviceDayList $serviceDayList
     * @param exclusionDayList $exclusionDayList
     * @access public
     */
    public function __construct($extendedIdentifier, $condition, $priceDefinition, $slidingPriceList, $propertyList, $groupedPropertyList, $serviceDayList, $exclusionDayList)
    {
      $this->extendedIdentifier = $extendedIdentifier;
      $this->condition = $condition;
      $this->priceDefinition = $priceDefinition;
      $this->slidingPriceList = $slidingPriceList;
      $this->propertyList = $propertyList;
      $this->groupedPropertyList = $groupedPropertyList;
      $this->serviceDayList = $serviceDayList;
      $this->exclusionDayList = $exclusionDayList;
    }

}

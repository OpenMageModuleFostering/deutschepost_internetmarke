<?php

namespace DeutschePost\ProdWs\Soap;

class searchParameterType
{

    /**
     * @var productID $productID
     * @access public
     */
    public $productID = null;

    /**
     * @var productName $productName
     * @access public
     */
    public $productName = null;

    /**
     * @var productPrice $productPrice
     * @access public
     */
    public $productPrice = null;

    /**
     * @var productValidity $productValidity
     * @access public
     */
    public $productValidity = null;

    /**
     * @var productDimensionList $productDimensionList
     * @access public
     */
    public $productDimensionList = null;

    /**
     * @var productWeight $productWeight
     * @access public
     */
    public $productWeight = null;

    /**
     * @var productPropertyList $productPropertyList
     * @access public
     */
    public $productPropertyList = null;

    /**
     * @var productUsage $productUsage
     * @access public
     */
    public $productUsage = null;

    /**
     * @var productCategory $productCategory
     * @access public
     */
    public $productCategory = null;

    /**
     * @var productStampType $productStampType
     * @access public
     */
    public $productStampType = null;

    /**
     * @var productGroup $productGroup
     * @access public
     */
    public $productGroup = null;

    /**
     * @var branch $branch
     * @access public
     */
    public $branch = null;

    /**
     * @var destination $destination
     * @access public
     */
    public $destination = null;

    /**
     * @var countryGroupList $countryGroupList
     * @access public
     */
    public $countryGroupList = null;

    /**
     * @var chargeZoneList $chargeZoneList
     * @access public
     */
    public $chargeZoneList = null;

    /**
     * @var countryList $countryList
     * @access public
     */
    public $countryList = null;

    /**
     * @var additionalProductList $additionalProductList
     * @access public
     */
    public $additionalProductList = null;

    /**
     * @param productID $productID
     * @param productName $productName
     * @param productPrice $productPrice
     * @param productValidity $productValidity
     * @param productDimensionList $productDimensionList
     * @param productWeight $productWeight
     * @param productPropertyList $productPropertyList
     * @param productUsage $productUsage
     * @param productCategory $productCategory
     * @param productStampType $productStampType
     * @param productGroup $productGroup
     * @param branch $branch
     * @param destination $destination
     * @param countryGroupList $countryGroupList
     * @param chargeZoneList $chargeZoneList
     * @param countryList $countryList
     * @param additionalProductList $additionalProductList
     * @access public
     */
    public function __construct($productID, $productName, $productPrice, $productValidity, $productDimensionList, $productWeight, $productPropertyList, $productUsage, $productCategory, $productStampType, $productGroup, $branch, $destination, $countryGroupList, $chargeZoneList, $countryList, $additionalProductList)
    {
      $this->productID = $productID;
      $this->productName = $productName;
      $this->productPrice = $productPrice;
      $this->productValidity = $productValidity;
      $this->productDimensionList = $productDimensionList;
      $this->productWeight = $productWeight;
      $this->productPropertyList = $productPropertyList;
      $this->productUsage = $productUsage;
      $this->productCategory = $productCategory;
      $this->productStampType = $productStampType;
      $this->productGroup = $productGroup;
      $this->branch = $branch;
      $this->destination = $destination;
      $this->countryGroupList = $countryGroupList;
      $this->chargeZoneList = $chargeZoneList;
      $this->countryList = $countryList;
      $this->additionalProductList = $additionalProductList;
    }

}

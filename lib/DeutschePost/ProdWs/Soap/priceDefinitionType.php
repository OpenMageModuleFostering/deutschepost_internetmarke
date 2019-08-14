<?php

namespace DeutschePost\ProdWs\Soap;

class priceDefinitionType
{

    /**
     * @var priceType $price
     * @access public
     */
    public $price = null;

    /**
     * @var tempPriceList $tempPriceList
     * @access public
     */
    public $tempPriceList = null;

    /**
     * @var priceType $minimalPrice
     * @access public
     */
    public $minimalPrice = null;

    /**
     * @var priceFormulaType $priceFormula
     * @access public
     */
    public $priceFormula = null;

    /**
     * @param priceType $price
     * @param tempPriceList $tempPriceList
     * @param priceType $minimalPrice
     * @param priceFormulaType $priceFormula
     * @access public
     */
    public function __construct($price, $tempPriceList, $minimalPrice, $priceFormula)
    {
      $this->price = $price;
      $this->tempPriceList = $tempPriceList;
      $this->minimalPrice = $minimalPrice;
      $this->priceFormula = $priceFormula;
    }

}

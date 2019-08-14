<?php

namespace DeutschePost\ProdWs\Soap;

class propertyValueType
{

    /**
     * @var alphanumericValueType $alphanumericValue
     * @access public
     */
    public $alphanumericValue = null;

    /**
     * @var numericValueType $numericValue
     * @access public
     */
    public $numericValue = null;

    /**
     * @var boolean $booleanValue
     * @access public
     */
    public $booleanValue = null;

    /**
     * @var dateValueType $dateValue
     * @access public
     */
    public $dateValue = null;

    /**
     * @var currencyValueType $currencyValue
     * @access public
     */
    public $currencyValue = null;

    /**
     * @var anyURI $hyperlinkValue
     * @access public
     */
    public $hyperlinkValue = null;

    /**
     * @param alphanumericValueType $alphanumericValue
     * @param numericValueType $numericValue
     * @param boolean $booleanValue
     * @param dateValueType $dateValue
     * @param currencyValueType $currencyValue
     * @param anyURI $hyperlinkValue
     * @access public
     */
    public function __construct($alphanumericValue, $numericValue, $booleanValue, $dateValue, $currencyValue, $hyperlinkValue)
    {
      $this->alphanumericValue = $alphanumericValue;
      $this->numericValue = $numericValue;
      $this->booleanValue = $booleanValue;
      $this->dateValue = $dateValue;
      $this->currencyValue = $currencyValue;
      $this->hyperlinkValue = $hyperlinkValue;
    }

}

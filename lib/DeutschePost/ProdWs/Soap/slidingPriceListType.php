<?php

namespace DeutschePost\ProdWs\Soap;

class slidingPriceListType
{

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
     * @var slidingPriceType[] $slidingPrice
     * @access public
     */
    public $slidingPrice = null;

    /**
     * @param string_maxLen50 $name
     * @param string_maxLen20 $shortName
     * @param string_maxLen1000 $description
     * @param string_maxLen1000 $annotation
     * @param slidingPriceType[] $slidingPrice
     * @access public
     */
    public function __construct($name, $shortName, $description, $annotation, $slidingPrice)
    {
      $this->name = $name;
      $this->shortName = $shortName;
      $this->description = $description;
      $this->annotation = $annotation;
      $this->slidingPrice = $slidingPrice;
    }

}

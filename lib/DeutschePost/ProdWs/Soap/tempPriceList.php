<?php

namespace DeutschePost\ProdWs\Soap;

class tempPriceList
{

    /**
     * @var tempPriceType $tempPrice
     * @access public
     */
    public $tempPrice = null;

    /**
     * @param tempPriceType $tempPrice
     * @access public
     */
    public function __construct($tempPrice)
    {
      $this->tempPrice = $tempPrice;
    }

}

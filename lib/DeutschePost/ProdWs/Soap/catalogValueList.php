<?php

namespace DeutschePost\ProdWs\Soap;

class catalogValueList
{

    /**
     * @var catalogValueType $catalogValue
     * @access public
     */
    public $catalogValue = null;

    /**
     * @param catalogValueType $catalogValue
     * @access public
     */
    public function __construct($catalogValue)
    {
      $this->catalogValue = $catalogValue;
    }

}

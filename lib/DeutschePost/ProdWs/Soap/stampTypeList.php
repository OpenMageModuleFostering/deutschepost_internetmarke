<?php

namespace DeutschePost\ProdWs\Soap;

class stampTypeList
{

    /**
     * @var groupedPropertyType $stampType
     * @access public
     */
    public $stampType = null;

    /**
     * @param groupedPropertyType $stampType
     * @access public
     */
    public function __construct($stampType)
    {
      $this->stampType = $stampType;
    }

}

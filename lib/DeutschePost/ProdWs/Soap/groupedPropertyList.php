<?php

namespace DeutschePost\ProdWs\Soap;

class groupedPropertyList
{

    /**
     * @var groupedPropertyType $groupedProperty
     * @access public
     */
    public $groupedProperty = null;

    /**
     * @param groupedPropertyType $groupedProperty
     * @access public
     */
    public function __construct($groupedProperty)
    {
      $this->groupedProperty = $groupedProperty;
    }

}

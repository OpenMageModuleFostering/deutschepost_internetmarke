<?php

namespace DeutschePost\ProdWs\Soap;

class usageList
{

    /**
     * @var groupedPropertyType $usage
     * @access public
     */
    public $usage = null;

    /**
     * @param groupedPropertyType $usage
     * @access public
     */
    public function __construct($usage)
    {
      $this->usage = $usage;
    }

}

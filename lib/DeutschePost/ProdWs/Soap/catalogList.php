<?php

namespace DeutschePost\ProdWs\Soap;

class catalogList
{

    /**
     * @var catalogType $catalog
     * @access public
     */
    public $catalog = null;

    /**
     * @param catalogType $catalog
     * @access public
     */
    public function __construct($catalog)
    {
      $this->catalog = $catalog;
    }

}

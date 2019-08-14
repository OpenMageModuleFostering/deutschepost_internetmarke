<?php

namespace DeutschePost\ProdWs\Soap;

class getCatalogResponseType
{

    /**
     * @var catalogType $catalog
     * @access public
     */
    public $catalog = null;

    /**
     * @var string_maxLen1000 $message
     * @access public
     */
    public $message = null;

    /**
     * @param catalogType $catalog
     * @param string_maxLen1000 $message
     * @access public
     */
    public function __construct($catalog, $message)
    {
      $this->catalog = $catalog;
      $this->message = $message;
    }

}

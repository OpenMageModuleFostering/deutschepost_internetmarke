<?php

namespace DeutschePost\ProdWs\Soap;

class getCatalogChangeInformationResponseType
{

    /**
     * @var boolean $changesAvailable
     * @access public
     */
    public $changesAvailable = null;

    /**
     * @var catalogType[] $catalog
     * @access public
     */
    public $catalog = null;

    /**
     * @param boolean $changesAvailable
     * @param catalogType[] $catalog
     * @access public
     */
    public function __construct($changesAvailable, $catalog)
    {
      $this->changesAvailable = $changesAvailable;
      $this->catalog = $catalog;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class accountProdReferenceType
{

    /**
     * @var countryNegativList $countryNegativList
     * @access public
     */
    public $countryNegativList = null;

    /**
     * @var string_maxLen50 $ProdWSID
     * @access public
     */
    public $ProdWSID = null;

    /**
     * @var int $version
     * @access public
     */
    public $version = null;

    /**
     * @param countryNegativList $countryNegativList
     * @param string_maxLen50 $ProdWSID
     * @param int $version
     * @access public
     */
    public function __construct($countryNegativList, $ProdWSID, $version)
    {
      $this->countryNegativList = $countryNegativList;
      $this->ProdWSID = $ProdWSID;
      $this->version = $version;
    }

}

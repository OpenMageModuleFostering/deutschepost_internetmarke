<?php

namespace DeutschePost\ProdWs\Soap;

class internationalDestinationAreaType
{

    /**
     * @var countryList $countryList
     * @access public
     */
    public $countryList = null;

    /**
     * @var countryNegativList $countryNegativList
     * @access public
     */
    public $countryNegativList = null;

    /**
     * @var countryGroupList $countryGroupList
     * @access public
     */
    public $countryGroupList = null;

    /**
     * @var chargeZoneList $chargeZoneList
     * @access public
     */
    public $chargeZoneList = null;

    /**
     * @param countryList $countryList
     * @param countryNegativList $countryNegativList
     * @param countryGroupList $countryGroupList
     * @param chargeZoneList $chargeZoneList
     * @access public
     */
    public function __construct($countryList, $countryNegativList, $countryGroupList, $chargeZoneList)
    {
      $this->countryList = $countryList;
      $this->countryNegativList = $countryNegativList;
      $this->countryGroupList = $countryGroupList;
      $this->chargeZoneList = $chargeZoneList;
    }

}

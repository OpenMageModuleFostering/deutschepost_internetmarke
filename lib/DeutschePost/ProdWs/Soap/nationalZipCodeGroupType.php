<?php

namespace DeutschePost\ProdWs\Soap;

class nationalZipCodeGroupType
{

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var string_maxLen1000 $description
     * @access public
     */
    public $description = null;

    /**
     * @var routeRegionType $routeRegion
     * @access public
     */
    public $routeRegion = null;

    /**
     * @var routeZoneType $routeZone
     * @access public
     */
    public $routeZone = null;

    /**
     * @var nationalZipCodeArea $nationalZipCodeArea
     * @access public
     */
    public $nationalZipCodeArea = null;

    /**
     * @param string_maxLen50 $name
     * @param string_maxLen1000 $description
     * @param routeRegionType $routeRegion
     * @param routeZoneType $routeZone
     * @param nationalZipCodeArea $nationalZipCodeArea
     * @access public
     */
    public function __construct($name, $description, $routeRegion, $routeZone, $nationalZipCodeArea)
    {
      $this->name = $name;
      $this->description = $description;
      $this->routeRegion = $routeRegion;
      $this->routeZone = $routeZone;
      $this->nationalZipCodeArea = $nationalZipCodeArea;
    }

}

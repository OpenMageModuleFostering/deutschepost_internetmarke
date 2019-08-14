<?php

namespace DeutschePost\ProdWs\Soap;

class serviceDayList
{

    /**
     * @var dayType $serviceDay
     * @access public
     */
    public $serviceDay = null;

    /**
     * @param dayType $serviceDay
     * @access public
     */
    public function __construct($serviceDay)
    {
      $this->serviceDay = $serviceDay;
    }

}

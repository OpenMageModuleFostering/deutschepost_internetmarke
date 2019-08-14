<?php

namespace DeutschePost\ProdWs\Soap;

class exclusionDayList
{

    /**
     * @var specialDayType $exclusionDay
     * @access public
     */
    public $exclusionDay = null;

    /**
     * @param specialDayType $exclusionDay
     * @access public
     */
    public function __construct($exclusionDay)
    {
      $this->exclusionDay = $exclusionDay;
    }

}

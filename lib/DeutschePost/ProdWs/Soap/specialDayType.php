<?php

namespace DeutschePost\ProdWs\Soap;

class specialDayType
{

    /**
     * @var date $date
     * @access public
     */
    public $date = null;

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var region[] $region
     * @access public
     */
    public $region = null;

    /**
     * @param date $date
     * @param string_maxLen50 $name
     * @param region[] $region
     * @access public
     */
    public function __construct($date, $name, $region)
    {
      $this->date = $date;
      $this->name = $name;
      $this->region = $region;
    }

}

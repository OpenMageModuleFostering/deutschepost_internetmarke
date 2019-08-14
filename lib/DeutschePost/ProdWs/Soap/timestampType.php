<?php

namespace DeutschePost\ProdWs\Soap;

class timestampType
{

    /**
     * @var date $date
     * @access public
     */
    public $date = null;

    /**
     * @var time $time
     * @access public
     */
    public $time = null;

    /**
     * @param date $date
     * @param time $time
     * @access public
     */
    public function __construct($date, $time)
    {
      $this->date = $date;
      $this->time = $time;
    }

}

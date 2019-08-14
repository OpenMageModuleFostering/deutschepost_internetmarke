<?php

namespace DeutschePost\ProdWs\Soap;

class dateValueType
{

    /**
     * @var date $firstDate
     * @access public
     */
    public $firstDate = null;

    /**
     * @var date $lastDate
     * @access public
     */
    public $lastDate = null;

    /**
     * @var date $fixDate
     * @access public
     */
    public $fixDate = null;

    /**
     * @param date $firstDate
     * @param date $lastDate
     * @param date $fixDate
     * @access public
     */
    public function __construct($firstDate, $lastDate, $fixDate)
    {
      $this->firstDate = $firstDate;
      $this->lastDate = $lastDate;
      $this->fixDate = $fixDate;
    }

}

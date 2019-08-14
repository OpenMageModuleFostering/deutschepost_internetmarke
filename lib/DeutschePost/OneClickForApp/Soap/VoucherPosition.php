<?php

namespace DeutschePost\OneClickForApp\Soap;

include_once('Position.php');

class VoucherPosition extends Position
{

    /**
     * @var int $page
     * @access public
     */
    public $page = null;

    /**
     * @param int $labelX
     * @param int $labelY
     * @param int $page
     * @access public
     */
    public function __construct($labelX, $labelY, $page)
    {
      parent::__construct($labelX, $labelY);
      $this->page = $page;
    }

}

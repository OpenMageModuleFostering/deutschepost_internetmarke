<?php

namespace DeutschePost\ProdWs\Soap;

class specialServiceList
{

    /**
     * @var specialServiceType $SpecialService
     * @access public
     */
    public $SpecialService = null;

    /**
     * @param specialServiceType $SpecialService
     * @access public
     */
    public function __construct($SpecialService)
    {
      $this->SpecialService = $SpecialService;
    }

}

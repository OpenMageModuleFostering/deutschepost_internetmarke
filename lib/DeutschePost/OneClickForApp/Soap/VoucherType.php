<?php

namespace DeutschePost\OneClickForApp\Soap;

class VoucherType
{

    /**
     * @var string $voucherId
     * @access public
     */
    public $voucherId = null;

    /**
     * @var string $trackId
     * @access public
     */
    public $trackId = null;

    /**
     * @param string $voucherId
     * @param string $trackId
     * @access public
     */
    public function __construct($voucherId, $trackId)
    {
      $this->voucherId = $voucherId;
      $this->trackId = $trackId;
    }

}

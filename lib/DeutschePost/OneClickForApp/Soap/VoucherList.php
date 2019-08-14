<?php

namespace DeutschePost\OneClickForApp\Soap;

class VoucherList
{

    /**
     * @var VoucherType[] $voucher
     * @access public
     */
    public $voucher = null;

    /**
     * @param VoucherType[] $voucher
     * @access public
     */
    public function __construct($voucher)
    {
      $this->voucher = $voucher;
    }

}

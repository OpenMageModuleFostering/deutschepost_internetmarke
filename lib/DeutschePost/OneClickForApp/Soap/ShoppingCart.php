<?php

namespace DeutschePost\OneClickForApp\Soap;

class ShoppingCart
{

    /**
     * @var ShopOrderId $shopOrderId
     * @access public
     */
    public $shopOrderId = null;

    /**
     * @var VoucherList $voucherList
     * @access public
     */
    public $voucherList = null;

    /**
     * @param ShopOrderId $shopOrderId
     * @param VoucherList $voucherList
     * @access public
     */
    public function __construct($shopOrderId, $voucherList)
    {
      $this->shopOrderId = $shopOrderId;
      $this->voucherList = $voucherList;
    }

}

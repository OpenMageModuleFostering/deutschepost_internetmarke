<?php

namespace DeutschePost\OneClickForApp\Soap;

class CreateShopOrderIdResponse
{

    /**
     * @var ShopOrderId $shopOrderId
     * @access public
     */
    public $shopOrderId = null;

    /**
     * @param ShopOrderId $shopOrderId
     * @access public
     */
    public function __construct($shopOrderId)
    {
      $this->shopOrderId = $shopOrderId;
    }

}

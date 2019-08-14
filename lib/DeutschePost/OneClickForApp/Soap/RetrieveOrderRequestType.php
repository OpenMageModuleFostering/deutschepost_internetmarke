<?php

namespace DeutschePost\OneClickForApp\Soap;

class RetrieveOrderRequestType
{

    /**
     * @var UserToken $userToken
     * @access public
     */
    public $userToken = null;

    /**
     * @var ShopOrderId $shopOrderId
     * @access public
     */
    public $shopOrderId = null;

    /**
     * @param UserToken $userToken
     * @param ShopOrderId $shopOrderId
     * @access public
     */
    public function __construct($userToken, $shopOrderId)
    {
      $this->userToken = $userToken;
      $this->shopOrderId = $shopOrderId;
    }

}

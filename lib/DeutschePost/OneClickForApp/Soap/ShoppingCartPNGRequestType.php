<?php

namespace DeutschePost\OneClickForApp\Soap;

class ShoppingCartPNGRequestType
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
     * @var PPL $ppl
     * @access public
     */
    public $ppl = null;

    /**
     * @var ShoppingCartPosition[] $positions
     * @access public
     */
    public $positions = null;

    /**
     * @var ShoppingCartPrice $total
     * @access public
     */
    public $total = null;

    /**
     * @var Flag $createManifest
     * @access public
     */
    public $createManifest = null;

    /**
     * @var ShippingList $createShippingList
     * @access public
     */
    public $createShippingList = null;

    /**
     * @param UserToken $userToken
     * @param ShopOrderId $shopOrderId
     * @param PPL $ppl
     * @param ShoppingCartPosition[] $positions
     * @param ShoppingCartPrice $total
     * @param Flag $createManifest
     * @param ShippingList $createShippingList
     * @access public
     */
    public function __construct($userToken, $shopOrderId, $ppl, $positions, $total, $createManifest, $createShippingList)
    {
      $this->userToken = $userToken;
      $this->shopOrderId = $shopOrderId;
      $this->ppl = $ppl;
      $this->positions = $positions;
      $this->total = $total;
      $this->createManifest = $createManifest;
      $this->createShippingList = $createShippingList;
    }

}

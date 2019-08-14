<?php

namespace DeutschePost\OneClickForApp\Soap;

class ShoppingCartResponseType
{

    /**
     * @var Link $link
     * @access public
     */
    public $link = null;

    /**
     * @var Link $manifestLink
     * @access public
     */
    public $manifestLink = null;

    /**
     * @var WalletBalance $walletBallance
     * @access public
     */
    public $walletBallance = null;

    /**
     * @var ShoppingCart $shoppingCart
     * @access public
     */
    public $shoppingCart = null;

    /**
     * @param Link $link
     * @param Link $manifestLink
     * @param WalletBalance $walletBallance
     * @param ShoppingCart $shoppingCart
     * @access public
     */
    public function __construct($link, $manifestLink, $walletBallance, $shoppingCart)
    {
      $this->link = $link;
      $this->manifestLink = $manifestLink;
      $this->walletBallance = $walletBallance;
      $this->shoppingCart = $shoppingCart;
    }

}

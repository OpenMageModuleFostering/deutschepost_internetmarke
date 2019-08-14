<?php

namespace DeutschePost\OneClickForApp\Soap;

class RetrieveOrderResponseType
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
     * @var ShoppingCart $shoppingCart
     * @access public
     */
    public $shoppingCart = null;

    /**
     * @param Link $link
     * @param Link $manifestLink
     * @param ShoppingCart $shoppingCart
     * @access public
     */
    public function __construct($link, $manifestLink, $shoppingCart)
    {
      $this->link = $link;
      $this->manifestLink = $manifestLink;
      $this->shoppingCart = $shoppingCart;
    }

}

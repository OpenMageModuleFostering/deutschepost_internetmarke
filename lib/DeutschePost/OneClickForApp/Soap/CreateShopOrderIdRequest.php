<?php

namespace DeutschePost\OneClickForApp\Soap;

class CreateShopOrderIdRequest
{

    /**
     * @var UserToken $userToken
     * @access public
     */
    public $userToken = null;

    /**
     * @param UserToken $userToken
     * @access public
     */
    public function __construct($userToken)
    {
      $this->userToken = $userToken;
    }

}

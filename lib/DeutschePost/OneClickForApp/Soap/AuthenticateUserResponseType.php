<?php

namespace DeutschePost\OneClickForApp\Soap;

class AuthenticateUserResponseType
{

    /**
     * @var UserToken $userToken
     * @access public
     */
    public $userToken = null;

    /**
     * @var WalletBalance $walletBalance
     * @access public
     */
    public $walletBalance = null;

    /**
     * @var boolean $showTermsAndConditions
     * @access public
     */
    public $showTermsAndConditions = null;

    /**
     * @var string $infoMessage
     * @access public
     */
    public $infoMessage = null;

    /**
     * @param UserToken $userToken
     * @param WalletBalance $walletBalance
     * @param boolean $showTermsAndConditions
     * @param string $infoMessage
     * @access public
     */
    public function __construct($userToken, $walletBalance, $showTermsAndConditions, $infoMessage)
    {
      $this->userToken = $userToken;
      $this->walletBalance = $walletBalance;
      $this->showTermsAndConditions = $showTermsAndConditions;
      $this->infoMessage = $infoMessage;
    }

}

<?php

namespace DeutschePost\OneClickForApp\Soap;

class AuthenticateUserException
{

    /**
     * @var AuthenticateUserErrorCodes $id
     * @access public
     */
    public $id = null;

    /**
     * @var string $message
     * @access public
     */
    public $message = null;

    /**
     * @param AuthenticateUserErrorCodes $id
     * @param string $message
     * @access public
     */
    public function __construct($id, $message)
    {
      $this->id = $id;
      $this->message = $message;
    }

}

<?php

namespace DeutschePost\OneClickForApp\Soap;

class RetrieveOrderException
{

    /**
     * @var string $message
     * @access public
     */
    public $message = null;

    /**
     * @var RetrieveOrderErrorCodes[] $errors
     * @access public
     */
    public $errors = null;

    /**
     * @param string $message
     * @param RetrieveOrderErrorCodes[] $errors
     * @access public
     */
    public function __construct($message, $errors)
    {
      $this->message = $message;
      $this->errors = $errors;
    }

}

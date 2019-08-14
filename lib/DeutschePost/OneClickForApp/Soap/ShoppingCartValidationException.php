<?php

namespace DeutschePost\OneClickForApp\Soap;

class ShoppingCartValidationException
{

    /**
     * @var string $message
     * @access public
     */
    public $message = null;

    /**
     * @var ShoppingCartValidationErrorInfo[] $errors
     * @access public
     */
    public $errors = null;

    /**
     * @param string $message
     * @param ShoppingCartValidationErrorInfo[] $errors
     * @access public
     */
    public function __construct($message, $errors)
    {
      $this->message = $message;
      $this->errors = $errors;
    }

}

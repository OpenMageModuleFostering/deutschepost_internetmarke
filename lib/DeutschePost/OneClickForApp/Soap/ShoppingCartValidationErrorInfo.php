<?php

namespace DeutschePost\OneClickForApp\Soap;

class ShoppingCartValidationErrorInfo
{

    /**
     * @var ShoppingCartValidationErrorCodes $id
     * @access public
     */
    public $id = null;

    /**
     * @var string $message
     * @access public
     */
    public $message = null;

    /**
     * @param ShoppingCartValidationErrorCodes $id
     * @param string $message
     * @access public
     */
    public function __construct($id, $message)
    {
      $this->id = $id;
      $this->message = $message;
    }

}

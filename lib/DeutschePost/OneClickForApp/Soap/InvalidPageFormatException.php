<?php

namespace DeutschePost\OneClickForApp\Soap;

class InvalidPageFormatException
{

    /**
     * @var string $message
     * @access public
     */
    public $message = null;

    /**
     * @param string $message
     * @access public
     */
    public function __construct($message)
    {
      $this->message = $message;
    }

}

<?php

namespace DeutschePost\OneClickForApp\Soap;

class AddressBinding
{

    /**
     * @var NamedAddress $sender
     * @access public
     */
    public $sender = null;

    /**
     * @var NamedAddress $receiver
     * @access public
     */
    public $receiver = null;

    /**
     * @param NamedAddress $sender
     * @param NamedAddress $receiver
     * @access public
     */
    public function __construct($sender, $receiver)
    {
      $this->sender = $sender;
      $this->receiver = $receiver;
    }

}

<?php

namespace DeutschePost\OneClickForApp\Soap;

class NamedAddress
{

    /**
     * @var Name $name
     * @access public
     */
    public $name = null;

    /**
     * @var Address $address
     * @access public
     */
    public $address = null;

    /**
     * @param Name $name
     * @param Address $address
     * @access public
     */
    public function __construct($name, $address)
    {
      $this->name = $name;
      $this->address = $address;
    }

}

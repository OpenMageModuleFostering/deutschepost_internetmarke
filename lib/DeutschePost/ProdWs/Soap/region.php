<?php

namespace DeutschePost\ProdWs\Soap;

class region
{

    /**
     * @var anonymous56 $type
     * @access public
     */
    public $type = null;

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @param anonymous56 $type
     * @param string_maxLen50 $name
     * @access public
     */
    public function __construct($type, $name)
    {
      $this->type = $type;
      $this->name = $name;
    }

}

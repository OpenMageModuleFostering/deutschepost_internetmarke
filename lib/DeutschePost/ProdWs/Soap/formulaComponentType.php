<?php

namespace DeutschePost\ProdWs\Soap;

class formulaComponentType
{

    /**
     * @var int $prodwsID
     * @access public
     */
    public $prodwsID = null;

    /**
     * @var int $version
     * @access public
     */
    public $version = null;

    /**
     * @var string $component
     * @access public
     */
    public $component = null;

    /**
     * @param int $prodwsID
     * @param int $version
     * @param string $component
     * @access public
     */
    public function __construct($prodwsID, $version, $component)
    {
      $this->prodwsID = $prodwsID;
      $this->version = $version;
      $this->component = $component;
    }

}

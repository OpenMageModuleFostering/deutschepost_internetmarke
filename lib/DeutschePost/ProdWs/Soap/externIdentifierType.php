<?php

namespace DeutschePost\ProdWs\Soap;

class externIdentifierType
{

    /**
     * @var string_maxLen50 $source
     * @access public
     */
    public $source = null;

    /**
     * @var string_maxLen100 $id
     * @access public
     */
    public $id = null;

    /**
     * @var string_maxLen250 $name
     * @access public
     */
    public $name = null;

    /**
     * @var string_maxLen1000 $description
     * @access public
     */
    public $description = null;

    /**
     * @var string_maxLen1000 $annotation
     * @access public
     */
    public $annotation = null;

    /**
     * @var int $firstPPLVersion
     * @access public
     */
    public $firstPPLVersion = null;

    /**
     * @var int $lastPPLVersion
     * @access public
     */
    public $lastPPLVersion = null;

    /**
     * @var int $actualPPLVersion
     * @access public
     */
    public $actualPPLVersion = null;

    /**
     * @var anonymous19 $sapProductType
     * @access public
     */
    public $sapProductType = null;

    /**
     * @param string_maxLen50 $source
     * @param string_maxLen100 $id
     * @param string_maxLen250 $name
     * @param string_maxLen1000 $description
     * @param string_maxLen1000 $annotation
     * @param int $firstPPLVersion
     * @param int $lastPPLVersion
     * @param int $actualPPLVersion
     * @param anonymous19 $sapProductType
     * @access public
     */
    public function __construct($source, $id, $name, $description, $annotation, $firstPPLVersion, $lastPPLVersion, $actualPPLVersion, $sapProductType)
    {
      $this->source = $source;
      $this->id = $id;
      $this->name = $name;
      $this->description = $description;
      $this->annotation = $annotation;
      $this->firstPPLVersion = $firstPPLVersion;
      $this->lastPPLVersion = $lastPPLVersion;
      $this->actualPPLVersion = $actualPPLVersion;
      $this->sapProductType = $sapProductType;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class extendedIdentifierType
{

    /**
     * @var externIdentifierType[] $externIdentifier
     * @access public
     */
    public $externIdentifier = null;

    /**
     * @var string_maxLen50 $ProdWSID
     * @access public
     */
    public $ProdWSID = null;

    /**
     * @var string_maxLen250 $name
     * @access public
     */
    public $name = null;

    /**
     * @var string_maxLen100 $shortName
     * @access public
     */
    public $shortName = null;

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
     * @var branchType $branche
     * @access public
     */
    public $branche = null;

    /**
     * @var anonymous17 $destination
     * @access public
     */
    public $destination = null;

    /**
     * @var string_maxLen10 $transport
     * @access public
     */
    public $transport = null;

    /**
     * @var string_maxLen1 $type
     * @access public
     */
    public $type = null;

    /**
     * @var string_maxLen1 $state
     * @access public
     */
    public $state = null;

    /**
     * @var int $version
     * @access public
     */
    public $version = null;

    /**
     * @var dateTime $validFrom
     * @access public
     */
    public $validFrom = null;

    /**
     * @var dateTime $validTo
     * @access public
     */
    public $validTo = null;

    /**
     * @var date $release
     * @access public
     */
    public $release = null;

    /**
     * @param externIdentifierType[] $externIdentifier
     * @param string_maxLen50 $ProdWSID
     * @param string_maxLen250 $name
     * @param string_maxLen100 $shortName
     * @param string_maxLen1000 $description
     * @param string_maxLen1000 $annotation
     * @param branchType $branche
     * @param anonymous17 $destination
     * @param string_maxLen10 $transport
     * @param string_maxLen1 $type
     * @param string_maxLen1 $state
     * @param int $version
     * @param dateTime $validFrom
     * @param dateTime $validTo
     * @param date $release
     * @access public
     */
    public function __construct($externIdentifier, $ProdWSID, $name, $shortName, $description, $annotation, $branche, $destination, $transport, $type, $state, $version, $validFrom, $validTo, $release)
    {
      $this->externIdentifier = $externIdentifier;
      $this->ProdWSID = $ProdWSID;
      $this->name = $name;
      $this->shortName = $shortName;
      $this->description = $description;
      $this->annotation = $annotation;
      $this->branche = $branche;
      $this->destination = $destination;
      $this->transport = $transport;
      $this->type = $type;
      $this->state = $state;
      $this->version = $version;
      $this->validFrom = $validFrom;
      $this->validTo = $validTo;
      $this->release = $release;
    }

}

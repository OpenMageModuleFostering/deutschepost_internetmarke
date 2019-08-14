<?php

namespace DeutschePost\ProdWs\Soap;

class documentReferenceType
{

    /**
     * @var string_maxLen50 $type
     * @access public
     */
    public $type = null;

    /**
     * @var string_maxLen100 $title
     * @access public
     */
    public $title = null;

    /**
     * @var anyURI $reference
     * @access public
     */
    public $reference = null;

    /**
     * @var string_maxLen1000 $description
     * @access public
     */
    public $description = null;

    /**
     * @var string_maxLen50 $format
     * @access public
     */
    public $format = null;

    /**
     * @var string_maxLen50 $materialNumber
     * @access public
     */
    public $materialNumber = null;

    /**
     * @var string_maxLen50 $publishing
     * @access public
     */
    public $publishing = null;

    /**
     * @param string_maxLen50 $type
     * @param string_maxLen100 $title
     * @param anyURI $reference
     * @param string_maxLen1000 $description
     * @param string_maxLen50 $format
     * @param string_maxLen50 $materialNumber
     * @param string_maxLen50 $publishing
     * @access public
     */
    public function __construct($type, $title, $reference, $description, $format, $materialNumber, $publishing)
    {
      $this->type = $type;
      $this->title = $title;
      $this->reference = $reference;
      $this->description = $description;
      $this->format = $format;
      $this->materialNumber = $materialNumber;
      $this->publishing = $publishing;
    }

}

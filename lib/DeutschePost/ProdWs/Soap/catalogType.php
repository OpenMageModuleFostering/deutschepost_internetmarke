<?php

namespace DeutschePost\ProdWs\Soap;

class catalogType
{

    /**
     * @var catalogValueList $catalogValueList
     * @access public
     */
    public $catalogValueList = null;

    /**
     * @var int $id
     * @access public
     */
    public $id = null;

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var string_maxLen20 $shortName
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
     * @param catalogValueList $catalogValueList
     * @param int $id
     * @param string_maxLen50 $name
     * @param string_maxLen20 $shortName
     * @param string_maxLen1000 $description
     * @param string_maxLen1000 $annotation
     * @param dateTime $validFrom
     * @param dateTime $validTo
     * @access public
     */
    public function __construct($catalogValueList, $id, $name, $shortName, $description, $annotation, $validFrom, $validTo)
    {
      $this->catalogValueList = $catalogValueList;
      $this->id = $id;
      $this->name = $name;
      $this->shortName = $shortName;
      $this->description = $description;
      $this->annotation = $annotation;
      $this->validFrom = $validFrom;
      $this->validTo = $validTo;
    }

}

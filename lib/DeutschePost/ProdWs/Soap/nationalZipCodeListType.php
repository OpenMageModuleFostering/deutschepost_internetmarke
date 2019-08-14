<?php

namespace DeutschePost\ProdWs\Soap;

class nationalZipCodeListType
{

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var string_maxLen1000 $description
     * @access public
     */
    public $description = null;

    /**
     * @var nationalZipCodeType[] $nationalZipCode
     * @access public
     */
    public $nationalZipCode = null;

    /**
     * @param string_maxLen50 $name
     * @param string_maxLen1000 $description
     * @param nationalZipCodeType[] $nationalZipCode
     * @access public
     */
    public function __construct($name, $description, $nationalZipCode)
    {
      $this->name = $name;
      $this->description = $description;
      $this->nationalZipCode = $nationalZipCode;
    }

}

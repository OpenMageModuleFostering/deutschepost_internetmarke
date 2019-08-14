<?php

namespace DeutschePost\ProdWs\Soap;

class countryType
{

    /**
     * @var string_maxLen50 $name
     * @access public
     */
    public $name = null;

    /**
     * @var string_maxLen50 $alternativeName
     * @access public
     */
    public $alternativeName = null;

    /**
     * @var string_maxLen50 $insularAreaOf
     * @access public
     */
    public $insularAreaOf = null;

    /**
     * @var string_maxLen1000 $annotation
     * @access public
     */
    public $annotation = null;

    /**
     * @var anonymous75 $alpha2ISOCode
     * @access public
     */
    public $alpha2ISOCode = null;

    /**
     * @var anonymous76 $alpha3ISOCode
     * @access public
     */
    public $alpha3ISOCode = null;

    /**
     * @var int $numISOCode
     * @access public
     */
    public $numISOCode = null;

    /**
     * @var anonymous77 $pseudoCode
     * @access public
     */
    public $pseudoCode = null;

    /**
     * @var boolean $syntheticKey
     * @access public
     */
    public $syntheticKey = null;

    /**
     * @var date $validFrom
     * @access public
     */
    public $validFrom = null;

    /**
     * @var date $validTo
     * @access public
     */
    public $validTo = null;

    /**
     * @param string_maxLen50 $name
     * @param string_maxLen50 $alternativeName
     * @param string_maxLen50 $insularAreaOf
     * @param string_maxLen1000 $annotation
     * @param anonymous75 $alpha2ISOCode
     * @param anonymous76 $alpha3ISOCode
     * @param int $numISOCode
     * @param anonymous77 $pseudoCode
     * @param boolean $syntheticKey
     * @param date $validFrom
     * @param date $validTo
     * @access public
     */
    public function __construct($name, $alternativeName, $insularAreaOf, $annotation, $alpha2ISOCode, $alpha3ISOCode, $numISOCode, $pseudoCode, $syntheticKey, $validFrom, $validTo)
    {
      $this->name = $name;
      $this->alternativeName = $alternativeName;
      $this->insularAreaOf = $insularAreaOf;
      $this->annotation = $annotation;
      $this->alpha2ISOCode = $alpha2ISOCode;
      $this->alpha3ISOCode = $alpha3ISOCode;
      $this->numISOCode = $numISOCode;
      $this->pseudoCode = $pseudoCode;
      $this->syntheticKey = $syntheticKey;
      $this->validFrom = $validFrom;
      $this->validTo = $validTo;
    }

}

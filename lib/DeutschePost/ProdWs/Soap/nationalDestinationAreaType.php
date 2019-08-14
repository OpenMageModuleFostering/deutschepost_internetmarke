<?php

namespace DeutschePost\ProdWs\Soap;

class nationalDestinationAreaType
{

    /**
     * @var nationalZipCodeListType[] $nationalZipCodeList
     * @access public
     */
    public $nationalZipCodeList = null;

    /**
     * @var nationalZipCodeGroupType[] $nationalZipCodeGroup
     * @access public
     */
    public $nationalZipCodeGroup = null;

    /**
     * @param nationalZipCodeListType[] $nationalZipCodeList
     * @param nationalZipCodeGroupType[] $nationalZipCodeGroup
     * @access public
     */
    public function __construct($nationalZipCodeList, $nationalZipCodeGroup)
    {
      $this->nationalZipCodeList = $nationalZipCodeList;
      $this->nationalZipCodeGroup = $nationalZipCodeGroup;
    }

}

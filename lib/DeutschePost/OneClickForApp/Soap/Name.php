<?php

namespace DeutschePost\OneClickForApp\Soap;

class Name
{

    /**
     * @var PersonName $personName
     * @access public
     */
    public $personName = null;

    /**
     * @var CompanyName $companyName
     * @access public
     */
    public $companyName = null;

    /**
     * @param PersonName $personName
     * @param CompanyName $companyName
     * @access public
     */
    public function __construct($personName, $companyName)
    {
      $this->personName = $personName;
      $this->companyName = $companyName;
    }

}

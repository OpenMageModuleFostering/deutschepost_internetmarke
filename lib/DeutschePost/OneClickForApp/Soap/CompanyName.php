<?php

namespace DeutschePost\OneClickForApp\Soap;

class CompanyName
{

    /**
     * @var string $company
     * @access public
     */
    public $company = null;

    /**
     * @var PersonName $personName
     * @access public
     */
    public $personName = null;

    /**
     * @param string $company
     * @param PersonName $personName
     * @access public
     */
    public function __construct($company, $personName)
    {
      $this->company = $company;
      $this->personName = $personName;
    }

}

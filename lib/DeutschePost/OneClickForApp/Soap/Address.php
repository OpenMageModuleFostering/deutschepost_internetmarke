<?php

namespace DeutschePost\OneClickForApp\Soap;

class Address
{

    /**
     * @var string $additional
     * @access public
     */
    public $additional = null;

    /**
     * @var string $street
     * @access public
     */
    public $street = null;

    /**
     * @var string $houseNo
     * @access public
     */
    public $houseNo = null;

    /**
     * @var string $zip
     * @access public
     */
    public $zip = null;

    /**
     * @var string $city
     * @access public
     */
    public $city = null;

    /**
     * @var string $country
     * @access public
     */
    public $country = null;

    /**
     * @param string $additional
     * @param string $street
     * @param string $houseNo
     * @param string $zip
     * @param string $city
     * @param string $country
     * @access public
     */
    public function __construct($additional, $street, $houseNo, $zip, $city, $country)
    {
      $this->additional = $additional;
      $this->street = $street;
      $this->houseNo = $houseNo;
      $this->zip = $zip;
      $this->city = $city;
      $this->country = $country;
    }

}

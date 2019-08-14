<?php

namespace DeutschePost\OneClickForApp\Soap;

class PersonName
{

    /**
     * @var string $salutation
     * @access public
     */
    public $salutation = null;

    /**
     * @var string $title
     * @access public
     */
    public $title = null;

    /**
     * @var string $firstname
     * @access public
     */
    public $firstname = null;

    /**
     * @var string $lastname
     * @access public
     */
    public $lastname = null;

    /**
     * @param string $salutation
     * @param string $title
     * @param string $firstname
     * @param string $lastname
     * @access public
     */
    public function __construct($salutation, $title, $firstname, $lastname)
    {
      $this->salutation = $salutation;
      $this->title = $title;
      $this->firstname = $firstname;
      $this->lastname = $lastname;
    }

}

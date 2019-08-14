<?php

namespace DeutschePost\ProdWs\Soap;

class ExceptionDetailType
{

    /**
     * @var int $errorNumber
     * @access public
     */
    public $errorNumber = null;

    /**
     * @var string_maxLen1000 $errorMessage
     * @access public
     */
    public $errorMessage = null;

    /**
     * @var string_maxLen1000 $errorDetail
     * @access public
     */
    public $errorDetail = null;

    /**
     * @param int $errorNumber
     * @param string_maxLen1000 $errorMessage
     * @param string_maxLen1000 $errorDetail
     * @access public
     */
    public function __construct($errorNumber, $errorMessage, $errorDetail)
    {
      $this->errorNumber = $errorNumber;
      $this->errorMessage = $errorMessage;
      $this->errorDetail = $errorDetail;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class seekProductResponse
{

    /**
     * @var seekProductResponseType $Response
     * @access public
     */
    public $Response = null;

    /**
     * @var Exception $Exception
     * @access public
     */
    public $Exception = null;

    /**
     * @var boolean $success
     * @access public
     */
    public $success = null;

    /**
     * @param seekProductResponseType $Response
     * @param Exception $Exception
     * @param boolean $success
     * @access public
     */
    public function __construct($Response, $Exception, $success)
    {
      $this->Response = $Response;
      $this->Exception = $Exception;
      $this->success = $success;
    }

}

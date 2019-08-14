<?php

namespace DeutschePost\ProdWs\Soap;

class getCatalogResponse
{

    /**
     * @var getCatalogResponseType $Response
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
     * @param getCatalogResponseType $Response
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

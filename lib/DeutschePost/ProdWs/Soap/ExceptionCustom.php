<?php

namespace DeutschePost\ProdWs\Soap;

class ExceptionCustom
{

    /**
     * @var ExceptionDetailType $exceptionDetail
     * @access public
     */
    public $exceptionDetail = null;

    /**
     * @param ExceptionDetailType $exceptionDetail
     * @access public
     */
    public function __construct($exceptionDetail)
    {
      $this->exceptionDetail = $exceptionDetail;
    }

}

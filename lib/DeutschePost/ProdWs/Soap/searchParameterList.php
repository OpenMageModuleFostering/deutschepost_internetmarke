<?php

namespace DeutschePost\ProdWs\Soap;

class searchParameterList
{

    /**
     * @var searchParameterType $searchParameter
     * @access public
     */
    public $searchParameter = null;

    /**
     * @param searchParameterType $searchParameter
     * @access public
     */
    public function __construct($searchParameter)
    {
      $this->searchParameter = $searchParameter;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class getCatalogListResponseType
{

    /**
     * @var catalogList $catalogList
     * @access public
     */
    public $catalogList = null;

    /**
     * @var string_maxLen1000 $message
     * @access public
     */
    public $message = null;

    /**
     * @param catalogList $catalogList
     * @param string_maxLen1000 $message
     * @access public
     */
    public function __construct($catalogList, $message)
    {
      $this->catalogList = $catalogList;
      $this->message = $message;
    }

}

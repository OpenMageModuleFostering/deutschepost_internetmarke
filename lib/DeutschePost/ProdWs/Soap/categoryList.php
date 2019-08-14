<?php

namespace DeutschePost\ProdWs\Soap;

class categoryList
{

    /**
     * @var groupedPropertyType $category
     * @access public
     */
    public $category = null;

    /**
     * @param groupedPropertyType $category
     * @access public
     */
    public function __construct($category)
    {
      $this->category = $category;
    }

}

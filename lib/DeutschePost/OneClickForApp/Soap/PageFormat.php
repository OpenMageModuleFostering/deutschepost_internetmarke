<?php

namespace DeutschePost\OneClickForApp\Soap;

class PageFormat
{

    /**
     * @var PageFormatId $id
     * @access public
     */
    public $id = null;

    /**
     * @var boolean $isAddressPossible
     * @access public
     */
    public $isAddressPossible = null;

    /**
     * @var boolean $isImagePossible
     * @access public
     */
    public $isImagePossible = null;

    /**
     * @var string $name
     * @access public
     */
    public $name = null;

    /**
     * @var string $description
     * @access public
     */
    public $description = null;

    /**
     * @var PageType $pageType
     * @access public
     */
    public $pageType = null;

    /**
     * @var pageLayout $pageLayout
     * @access public
     */
    public $pageLayout = null;

    /**
     * @param PageFormatId $id
     * @param boolean $isAddressPossible
     * @param boolean $isImagePossible
     * @param string $name
     * @param string $description
     * @param PageType $pageType
     * @param pageLayout $pageLayout
     * @access public
     */
    public function __construct($id, $isAddressPossible, $isImagePossible, $name, $description, $pageType, $pageLayout)
    {
      $this->id = $id;
      $this->isAddressPossible = $isAddressPossible;
      $this->isImagePossible = $isImagePossible;
      $this->name = $name;
      $this->description = $description;
      $this->pageType = $pageType;
      $this->pageLayout = $pageLayout;
    }

}

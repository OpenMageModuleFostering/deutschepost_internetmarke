<?php

namespace DeutschePost\OneClickForApp\Soap;

class GalleryItem
{

    /**
     * @var string $category
     * @access public
     */
    public $category = null;

    /**
     * @var string $categoryDescription
     * @access public
     */
    public $categoryDescription = null;

    /**
     * @var int $categoryId
     * @access public
     */
    public $categoryId = null;

    /**
     * @var ImageItem[] $images
     * @access public
     */
    public $images = null;

    /**
     * @param string $category
     * @param string $categoryDescription
     * @param int $categoryId
     * @param ImageItem[] $images
     * @access public
     */
    public function __construct($category, $categoryDescription, $categoryId, $images)
    {
      $this->category = $category;
      $this->categoryDescription = $categoryDescription;
      $this->categoryId = $categoryId;
      $this->images = $images;
    }

}

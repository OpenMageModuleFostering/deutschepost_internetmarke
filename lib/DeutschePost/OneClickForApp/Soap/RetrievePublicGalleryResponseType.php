<?php

namespace DeutschePost\OneClickForApp\Soap;

class RetrievePublicGalleryResponseType
{

    /**
     * @var GalleryItem[] $items
     * @access public
     */
    public $items = null;

    /**
     * @param GalleryItem[] $items
     * @access public
     */
    public function __construct($items)
    {
      $this->items = $items;
    }

}

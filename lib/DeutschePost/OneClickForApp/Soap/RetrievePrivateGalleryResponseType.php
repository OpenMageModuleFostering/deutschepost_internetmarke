<?php

namespace DeutschePost\OneClickForApp\Soap;

class RetrievePrivateGalleryResponseType
{

    /**
     * @var MotiveLink[] $imageLink
     * @access public
     */
    public $imageLink = null;

    /**
     * @param MotiveLink[] $imageLink
     * @access public
     */
    public function __construct($imageLink)
    {
      $this->imageLink = $imageLink;
    }

}

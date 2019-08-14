<?php

namespace DeutschePost\OneClickForApp\Soap;

class ImageItem
{

    /**
     * @var ImageID $imageID
     * @access public
     */
    public $imageID = null;

    /**
     * @var string $imageDescription
     * @access public
     */
    public $imageDescription = null;

    /**
     * @var string $imageSlogan
     * @access public
     */
    public $imageSlogan = null;

    /**
     * @var MotiveLink $links
     * @access public
     */
    public $links = null;

    /**
     * @param ImageID $imageID
     * @param string $imageDescription
     * @param string $imageSlogan
     * @param MotiveLink $links
     * @access public
     */
    public function __construct($imageID, $imageDescription, $imageSlogan, $links)
    {
      $this->imageID = $imageID;
      $this->imageDescription = $imageDescription;
      $this->imageSlogan = $imageSlogan;
      $this->links = $links;
    }

}

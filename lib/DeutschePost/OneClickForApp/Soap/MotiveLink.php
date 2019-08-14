<?php

namespace DeutschePost\OneClickForApp\Soap;

class MotiveLink
{

    /**
     * @var Link $link
     * @access public
     */
    public $link = null;

    /**
     * @var Link $linkThumbnail
     * @access public
     */
    public $linkThumbnail = null;

    /**
     * @param Link $link
     * @param Link $linkThumbnail
     * @access public
     */
    public function __construct($link, $linkThumbnail)
    {
      $this->link = $link;
      $this->linkThumbnail = $linkThumbnail;
    }

}

<?php

namespace DeutschePost\OneClickForApp\Soap;

class RetrievePreviewVoucherResponseType
{

    /**
     * @var Link $link
     * @access public
     */
    public $link = null;

    /**
     * @param Link $link
     * @access public
     */
    public function __construct($link)
    {
      $this->link = $link;
    }

}

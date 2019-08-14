<?php

namespace DeutschePost\OneClickForApp\Soap;

class RetrievePageFormatsResponseType
{

    /**
     * @var PageFormat[] $pageFormat
     * @access public
     */
    public $pageFormat = null;

    /**
     * @param PageFormat[] $pageFormat
     * @access public
     */
    public function __construct($pageFormat)
    {
      $this->pageFormat = $pageFormat;
    }

}

<?php

namespace DeutschePost\ProdWs\Soap;

class destinationAreaType
{

    /**
     * @var nationalDestinationAreaType $nationalDestinationArea
     * @access public
     */
    public $nationalDestinationArea = null;

    /**
     * @var internationalDestinationAreaType $internationalDestinationArea
     * @access public
     */
    public $internationalDestinationArea = null;

    /**
     * @param nationalDestinationAreaType $nationalDestinationArea
     * @param internationalDestinationAreaType $internationalDestinationArea
     * @access public
     */
    public function __construct($nationalDestinationArea, $internationalDestinationArea)
    {
      $this->nationalDestinationArea = $nationalDestinationArea;
      $this->internationalDestinationArea = $internationalDestinationArea;
    }

}

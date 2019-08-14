<?php

namespace DeutschePost\OneClickForApp\Soap;

class RetrievePreviewVoucherPNGRequestType
{

    /**
     * @var ProductCode $productCode
     * @access public
     */
    public $productCode = null;

    /**
     * @var ImageID $imageID
     * @access public
     */
    public $imageID = null;

    /**
     * @var VoucherLayout $voucherLayout
     * @access public
     */
    public $voucherLayout = null;

    /**
     * @param ProductCode $productCode
     * @param ImageID $imageID
     * @param VoucherLayout $voucherLayout
     * @access public
     */
    public function __construct($productCode, $imageID, $voucherLayout)
    {
      $this->productCode = $productCode;
      $this->imageID = $imageID;
      $this->voucherLayout = $voucherLayout;
    }

}

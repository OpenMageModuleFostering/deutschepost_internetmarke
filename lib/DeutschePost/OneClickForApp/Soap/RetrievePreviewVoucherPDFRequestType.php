<?php

namespace DeutschePost\OneClickForApp\Soap;

class RetrievePreviewVoucherPDFRequestType
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
     * @var PageFormatId $pageFormatId
     * @access public
     */
    public $pageFormatId = null;

    /**
     * @param ProductCode $productCode
     * @param ImageID $imageID
     * @param VoucherLayout $voucherLayout
     * @param PageFormatId $pageFormatId
     * @access public
     */
    public function __construct($productCode, $imageID, $voucherLayout, $pageFormatId)
    {
      $this->productCode = $productCode;
      $this->imageID = $imageID;
      $this->voucherLayout = $voucherLayout;
      $this->pageFormatId = $pageFormatId;
    }

}

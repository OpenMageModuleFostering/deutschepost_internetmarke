<?php

namespace DeutschePost\OneClickForApp\Soap;

class ShoppingCartPosition
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
     * @var AddressBinding $address
     * @access public
     */
    public $address = null;

    /**
     * @var string $additionalInfo
     * @access public
     */
    public $additionalInfo = null;

    /**
     * @var VoucherLayout $voucherLayout
     * @access public
     */
    public $voucherLayout = null;

    /**
     * @param ProductCode $productCode
     * @param ImageID $imageID
     * @param AddressBinding $address
     * @param string $additionalInfo
     * @param VoucherLayout $voucherLayout
     * @access public
     */
    public function __construct($productCode, $imageID, $address, $additionalInfo, $voucherLayout)
    {
      $this->productCode = $productCode;
      $this->imageID = $imageID;
      $this->address = $address;
      $this->additionalInfo = $additionalInfo;
      $this->voucherLayout = $voucherLayout;
    }

}

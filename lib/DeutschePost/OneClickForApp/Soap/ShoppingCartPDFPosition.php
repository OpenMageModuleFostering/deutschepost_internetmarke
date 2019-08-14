<?php

namespace DeutschePost\OneClickForApp\Soap;

include_once('ShoppingCartPosition.php');

class ShoppingCartPDFPosition extends ShoppingCartPosition
{

    /**
     * @var VoucherPosition $position
     * @access public
     */
    public $position = null;

    /**
     * @param ProductCode $productCode
     * @param ImageID $imageID
     * @param AddressBinding $address
     * @param string $additionalInfo
     * @param VoucherLayout $voucherLayout
     * @param VoucherPosition $position
     * @access public
     */
    public function __construct($productCode, $imageID, $address, $additionalInfo, $voucherLayout, $position)
    {
      parent::__construct($productCode, $imageID, $address, $additionalInfo, $voucherLayout);
      $this->position = $position;
    }

}

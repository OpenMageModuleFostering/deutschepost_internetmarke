<?php
/**
 * DeutschePost OneClickForApp
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to
 * newer versions in the future.
 *
 * PHP version 5
 *
 * @category  DeutschePost
 * @package   DeutschePost_OneClickForApp
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/**
 * DeutschePost_OneClickForApp_Model_Cron
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Model_Cron
{
    const CRON_MESSAGE_CHECKOUT_SUCCESS = '%d item(s) were successfully transferred to the order interface.';

    /**
     * @param Mage_Cron_Model_Schedule $schedule
     */
    public function checkoutFrankings(Mage_Cron_Model_Schedule $schedule)
    {
        $gateway = Mage::getModel('deutschepost_oneclickforapp/gateway');

        try {
            $num = $gateway->checkoutShoppingCartPDF();

            $schedule->setMessages(sprintf(self::CRON_MESSAGE_CHECKOUT_SUCCESS, $num));
            $schedule->setStatus(Mage_Cron_Model_Schedule::STATUS_SUCCESS);
        } catch (Exception $e) {
            Mage::logException($e);

            $schedule->setMessages($e->getMessage());
            $schedule->setStatus(Mage_Cron_Model_Schedule::STATUS_ERROR);
        }
    }
}

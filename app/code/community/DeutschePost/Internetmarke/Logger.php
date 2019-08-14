<?php
/**
 * DeutschePost Internetmarke
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
 * @package   DeutschePost_Internetmarke
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/**
 * DeutschePost_Internetmarke_Exception
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Logger
{
    /**
     * The filename to write to.
     *
     * @see Mage::log()
     * @var string
     */
    public static $logfile = 'internetmarke.log';

    /**
     * Log messages via Zend_Log_Writer_Abstract.
     *
     * @param $message
     * @param int $level
     */
    public static function log($message, $level = null)
    {
        if (Mage::getModel('deutschepost_internetmarke/config')->isLoggingEnabled($level)) {
            Mage::log($message, $level, static::$logfile);
        }
    }

    /**
     * Log debug messages (default behaviour).
     *
     * @param $message
     */
    public static function logDebug($message)
    {
        static::log($message, Zend_Log::DEBUG);
    }

    /**
     * Log error messages.
     *
     * @param $message
     */
    public static function logError($message)
    {
        static::log($message, Zend_Log::ERR);
    }

    /**
     * Log info messages.
     *
     * @param $message
     */
    public static function logInfo($message)
    {
        static::log($message, Zend_Log::INFO);
    }
}

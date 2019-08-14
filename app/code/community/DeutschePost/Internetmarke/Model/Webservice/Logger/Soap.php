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
 * DeutschePost_Internetmarke_Model_Webservice_Logger_Soap
 *
 * Logger class for soap requests. If a separate logfile should be used,
 * add a logfile property.
 * @see DeutschePost_Internetmarke_Logger::$logfile
 *
 * @category DeutschePost
 * @package  DeutschePost_Internetmarke
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Model_Webservice_Logger_Soap
    extends DeutschePost_Internetmarke_Logger
    implements DeutschePost_Internetmarke_Model_Webservice_Logger_Interface
{
    /**
     * Log request headers and body.
     *
     * @param Zend_Soap_Client $client
     */
    public static function logRequest($client)
    {
        if ($client instanceof Zend_Soap_Client) {
            $message = sprintf(
                "\n%s\n%s\n%s\n",
                str_repeat(">", 80),
                $client->getLastRequestHeaders(),
                $client->getLastRequest()
            );

            static::logInfo($message);
        }
    }

    /**
     * Log response headers and body.
     *
     * @param Zend_Soap_Client $client
     */
    public static function logResponse($client)
    {
        if ($client instanceof Zend_Soap_Client) {
            $message = sprintf(
                "\n%s\n%s\n%s\n",
                str_repeat("<", 80),
                $client->getLastResponseHeaders(),
                $client->getLastResponse()
            );

            static::logInfo($message);
        }
    }

    /**
     * Log SoapFault details.
     *
     * @param Exception $e
     */
    public static function logFault(Exception $e)
    {
        if ($e instanceof SoapFault && property_exists($e, 'detail')) {
            static::logError($e->detail);
        } else {
            static::logError($e->getMessage());
        }
    }
}

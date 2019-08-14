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
 * DeutschePost_OneClickForApp_Model_Webservice_Adapter_Soap_Auth
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_OneClickForApp_Security_Auth
{
    const DPAG_NAMESPACE_SEC     = 'http://oneclickforpartner.dpag.de';
    const NAME_PARTNER_ID        = 'PARTNER_ID';
    const NAME_REQUEST_TIMESTAMP = 'REQUEST_TIMESTAMP';
    const NAME_KEY_PHASE         = 'KEY_PHASE';
    const NAME_PARTNER_SIGNATURE = 'PARTNER_SIGNATURE';

    /**
     * Add auth request header to soap client.
     *
     * @param Zend_Soap_Client $client
     * @param DeutschePost_OneClickForApp_Security_Credential $credential
     */
    public static function addHeader(Zend_Soap_Client $client,
        DeutschePost_OneClickForApp_Security_Credential $credential
    ) {
        $partnerId = $credential->getPartnerId();
        $keyPhase  = $credential->getKeyPhase();
        $key       = $credential->getPartnerSignature();

        // The request timestamp used for authentication must be given in CE(S)T!
        $timezoneCet = new DateTimeZone('Europe/Berlin');
        $timeCet     = new DateTime('now', $timezoneCet);
        $date        = $timeCet->format("dmY-His");

        $signature = md5("$partnerId::$date::$keyPhase::$key");
        $signature = substr($signature, 0, 8);

        $ns = self::DPAG_NAMESPACE_SEC;
        $header = new SoapHeader($ns, self::NAME_PARTNER_ID, new SOAPVar($partnerId, XSD_STRING, null, null, null, $ns));
        $client->addSoapInputHeader($header, true);

        $header = new SoapHeader($ns, self::NAME_REQUEST_TIMESTAMP, new SOAPVar($date, XSD_STRING, null, null, null, $ns));
        $client->addSoapInputHeader($header, true);

        $header = new SoapHeader($ns, self::NAME_KEY_PHASE, new SOAPVar($keyPhase, XSD_STRING, null, null, null, $ns));
        $client->addSoapInputHeader($header, true);

        $header = new SoapHeader($ns, self::NAME_PARTNER_SIGNATURE, new SOAPVar($signature, XSD_STRING, null, null, null, $ns));
        $client->addSoapInputHeader($header, true);
    }
}

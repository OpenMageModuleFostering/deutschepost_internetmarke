<?php
/**
 * DeutschePost ProdWs
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
 * @package   DeutschePost_ProdWs
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2016 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

/**
 * DeutschePost_ProdWs_Wss_Auth
 *
 * WS-Security support as provided by the former Zend DeveloperGarden API
 * implementation. Realm is removed throughout this DeutschePost implementation.
 * @link http://framework.zend.com/changelog/1.12.14
 *
 * @category DeutschePost
 * @package  DeutschePost_ProdWs
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_ProdWs_Wss_Auth
{
    /**
     * WSSE Security Ext Namespace
     *
     * @var string
     */
    const WSSE_NAMESPACE_SECEXT = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd';

    /**
     * Security Element
     *
     * @var string
     */
    const WSSE_SECURITY_ELEMENT = 'Security';

    /**
     * UsernameToken Element
     *
     * @var string
     */
    const WSSE_ELEMENT_USERNAMETOKEN = 'UsernameToken';

    /**
     * Username Element
     *
     * @var string
     */
    const WSSE_ELEMENT_USERNAME = 'Username';

    /**
     * Password Element
     *
     * @var string
     */
    const WSSE_ELEMENT_PASSWORD = 'Password';

    /**
     * Password Element WSSE Type
     * This attribute is the source of all evil, not supported by PHJP
     */
    const WSSE_ELEMENT_PASSWORD_TYPE = 'http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-username-token-profile-1.0#PasswordText';

    /**
     * Add WSS Security Token to soap client header.
     *
     * Approaches using SOAP_ENC_OBJECT instead of XSD_ANYXML were not successful:
     * @link http://php.net/manual/en/soapvar.soapvar.php#101225
     * @link http://php.net/manual/en/class.soapheader.php#117594
     *
     * @param Zend_Soap_Client $client
     * @param DeutschePost_ProdWs_Wss_Credential $credential
     */
    public static function addWssLoginHeader(
        Zend_Soap_Client $client, DeutschePost_ProdWs_Wss_Credential $credential
    ) {
        $dom = new DOMDocument();

        /**
         * Security Element
         */
        $securityElement = $dom->createElementNS(
            self::WSSE_NAMESPACE_SECEXT,
            'wsse:' . self::WSSE_SECURITY_ELEMENT
        );
        $securityElement->setAttribute('mustUnderstand', true);

        /**
         * Username Token Element
         */
        $usernameTokenElement = $dom->createElementNS(
            self::WSSE_NAMESPACE_SECEXT,
            self::WSSE_ELEMENT_USERNAMETOKEN
        );

        /**
         * Username Element
         */
        $usernameElement = $dom->createElementNS(
            self::WSSE_NAMESPACE_SECEXT,
            self::WSSE_ELEMENT_USERNAME,
            $credential->getUsername()
        );

        /**
         * Password Element
         */
        $passwordElement = $dom->createElementNS(
            self::WSSE_NAMESPACE_SECEXT,
            self::WSSE_ELEMENT_PASSWORD,
            $credential->getPassword()
        );
        $passwordElement->setAttribute('Type', self::WSSE_ELEMENT_PASSWORD_TYPE);

        $usernameTokenElement->appendChild($usernameElement);
        $usernameTokenElement->appendChild($passwordElement);

        $securityElement->appendChild($usernameTokenElement);
        $dom->appendChild($securityElement);

        $authSoapVar = new SoapVar(
            $dom->saveXML($securityElement),
            XSD_ANYXML,
            self::WSSE_NAMESPACE_SECEXT,
            self::WSSE_SECURITY_ELEMENT
        );

        $authSoapHeader = new SoapHeader(
            self::WSSE_NAMESPACE_SECEXT,
            self::WSSE_SECURITY_ELEMENT,
            $authSoapVar,
            true
        );

        $client->addSoapInputHeader($authSoapHeader, true);
    }
}

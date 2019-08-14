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
class DeutschePost_OneClickForApp_Security_Credential
{
    /**
     * Service Auth PARTNER_ID
     *
     * @var string
     */
    protected $_partnerId = null;

    /**
     * Service Auth KEY_PHASE
     *
     * @var string
     */
    protected $_keyPhase = null;

    /**
     * Service Auth PARTNER_SIGNATURE
     *
     * @var string
     */
    protected $_partnerSignature = null;

    /**
     * constructor to init the internal data
     *
     * @param string $partnerId
     * @param string $keyPhase
     * @param string $partnerSignature
     */
    public function __construct($partnerId, $keyPhase, $partnerSignature)
    {
        $this->setPartnerId($partnerId);
        $this->setKeyPhase($keyPhase);
        $this->setPartnerSignature($partnerSignature);
    }

    /**
     * Set PARTNER_ID
     *
     * @param string $partnerId
     * @return $this
     * @throws DeutschePost_OneClickForApp_Security_Exception
     */
    protected function setPartnerId($partnerId)
    {
        if (empty($partnerId)) {
            throw new DeutschePost_OneClickForApp_Security_Exception('Empty PARTNER_ID not permitted.');
        }

        if (!is_string($partnerId)) {
            throw new DeutschePost_OneClickForApp_Security_Exception('PARTNER_ID must be a string.');
        }

        $this->_partnerId = $partnerId;
        return $this;
    }

    /**
     * returns the current configured PARTNER_ID
     *
     * @return string
     */
    public function getPartnerId()
    {
        return $this->_partnerId;
    }

    /**
     * Set KEY_PHASE
     *
     * @param string $keyPhase
     * @return $this
     * @throws DeutschePost_OneClickForApp_Security_Exception
     */
    protected function setKeyPhase($keyPhase)
    {
        if (empty($keyPhase)) {
            throw new DeutschePost_OneClickForApp_Security_Exception('Empty KEY_PHASE not permitted.');
        }

        if (!is_string($keyPhase)) {
            throw new DeutschePost_OneClickForApp_Security_Exception('KEY_PHASE must be a string.');
        }

        $this->_keyPhase = $keyPhase;
        return $this;
    }

    /**
     * returns the current configured KEY_PHASE
     *
     * @return string
     */
    public function getKeyPhase()
    {
        return $this->_keyPhase;
    }

    /**
     * Set PARTNER_SIGNATURE
     *
     * @param string $partnerSignature
     * @return $this
     * @throws DeutschePost_OneClickForApp_Security_Exception
     */
    protected function setPartnerSignature($partnerSignature)
    {
        if (empty($partnerSignature)) {
            throw new DeutschePost_OneClickForApp_Security_Exception('Empty PARTNER_SIGNATURE not permitted.');
        }

        if (!is_string($partnerSignature)) {
            throw new DeutschePost_OneClickForApp_Security_Exception('PARTNER_SIGNATURE must be a string.');
        }

        $this->_partnerSignature = $partnerSignature;
        return $this;
    }

    /**
     * returns the current configured PARTNER_SIGNATURE
     *
     * @return string
     */
    public function getPartnerSignature()
    {
        return $this->_partnerSignature;
    }
}

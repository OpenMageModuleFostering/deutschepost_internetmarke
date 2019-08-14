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
 * DeutschePost_ProdWs_Wss_Credential
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
class DeutschePost_ProdWs_Wss_Credential
{
    /**
     * Service Auth Username
     *
     * @var string
     */
    protected $_username = null;

    /**
     * Service Password
     *
     * @var string
     */
    protected $_password = null;

    /**
     * constructor to init the internal data
     *
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
    }

    /**
     * Set password
     *
     * @param string $password
     * @throws DeutschePost_ProdWs_Wss_Exception
     * @return DeutschePost_ProdWs_Wss_Credential
     */
    public function setPassword($password)
    {
        if (empty($password)) {
            throw new DeutschePost_ProdWs_Wss_Exception('Empty password not permitted.');
        }

        if (!is_string($password)) {
            throw new DeutschePost_ProdWs_Wss_Exception('Password must be a string.');
        }

        $this->_password = $password;
        return $this;
    }

    /**
     * returns the current configured password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * Set username
     *
     * @param string $username
     * @throws DeutschePost_ProdWs_Wss_Exception
     * @return DeutschePost_ProdWs_Wss_Credential
     */
    public function setUsername($username)
    {
        if (empty($username)) {
            throw new DeutschePost_ProdWs_Wss_Exception('Empty username not permitted.');
        }

        if (!is_string($username)) {
            throw new DeutschePost_ProdWs_Wss_Exception('Username must be a string.');
        }

        $this->_username = $username;
        return $this;
    }

    /**
     * returns the username
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->_username;
    }
}

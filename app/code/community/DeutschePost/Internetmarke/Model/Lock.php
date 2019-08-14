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
 * DeutschePost_Internetmarke_Model_Lock
 *
 * Prevent parallel execution of API requests using flock.
 * This is a backport of the Magento lock mechanism that was introduced in CE 1.9
 *
 * @see Mage_Index_Model_Lock
 * @link http://php.net/flock
 *
 * @category DeutschePost
 * @package  DeutschePost_OneClickForApp
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeutschePost_Internetmarke_Model_Lock
{
    /**
     * Singleton instance
     *
     * @var DeutschePost_Internetmarke_Model_Lock
     */
    protected static $_instance;

    /**
     * Array of registered file locks
     *
     * @var array
     */
    protected static $_lockFile = array();

    /**
     * Array of registered file lock resources
     *
     * @var array
     */
    protected static $_lockFileResource = array();

    /**
     * Constructor
     */
    protected function __construct()
    {
        register_shutdown_function(array($this, 'shutdownReleaseLocks'));
    }

    /**
     * Get lock singleton instance
     *
     * @return DeutschePost_Internetmarke_Model_Lock
     */
    public static function getInstance()
    {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Release all locks on application shutdown
     */
    public function shutdownReleaseLocks()
    {
        foreach (self::$_lockFile as $lockFile) {
            $this->releaseLock($lockFile);
        }

        foreach (self::$_lockFileResource as $lockFileResource) {
            if ($lockFileResource) {
                fclose($lockFileResource);
            }
        }
    }

    /**
     * Set named lock
     *
     * @param string $lockName
     * @param bool $block
     * @return bool
     */
    public function setLock($lockName, $block = false)
    {
        $operation = $block ? LOCK_EX : LOCK_EX | LOCK_NB;

        if (flock($this->_getLockFile($lockName), $operation)) {
            self::$_lockFile[$lockName] = $lockName;
            return true;
        }

        return false;
    }

    /**
     * Release named lock by name
     *
     * @param string $lockName
     * @return bool
     */
    public function releaseLock($lockName)
    {
        if (flock($this->_getLockFile($lockName), LOCK_UN)) {
            unset(self::$_lockFile[$lockName]);
            return true;
        }

        return false;
    }

    /**
     * Get lock file resource
     *
     * @param string $lockName
     * @return resource
     */
    protected function _getLockFile($lockName)
    {
        if (!isset(self::$_lockFileResource[$lockName]) || self::$_lockFileResource[$lockName] === null) {
            $varDir = Mage::getConfig()->getVarDir('locks');
            $file = $varDir . DS . $lockName . '.lock';
            if (is_file($file)) {
                self::$_lockFileResource[$lockName] = fopen($file, 'w');
            } else {
                self::$_lockFileResource[$lockName] = fopen($file, 'x');
            }
            fwrite(self::$_lockFileResource[$lockName], date('r'));
        }
        return self::$_lockFileResource[$lockName];
    }
}

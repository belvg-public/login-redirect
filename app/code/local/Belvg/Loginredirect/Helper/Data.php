<?php
/**
 * @author: A.A.Treitjak
 * @copyright: 2012 - 2013 BelVG.com
 */

class Belvg_Loginredirect_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_CONFIG_PATH = 'loginredirect/settings/';

    public function getConfigValue($key, $store = '')
    {
        return Mage::getStoreConfig(self::XML_CONFIG_PATH . $key, $store);
    }

    /**
     * Return path for redirect
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        $_path = (string) $this->_getConfigValue('path_redirect');
        return Mage::getUrl($_path);
    }

    public function isEnabled()
    {
        return (bool) $this->_getConfigValue('enabled');
    }

    protected function _getConfigValue($key)
    {
        return Mage::getStoreConfig(self::XML_CONFIG_PATH . $key);
    }
}

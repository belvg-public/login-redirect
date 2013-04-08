<?php
/**
 * @author: A.A.Treitjak
 * @copyright: 2012 - 2013 BelVG.com
 */

class Belvg_Loginredirect_Model_Observer_Customer
{
    public function customerLogin(Varien_Event_Observer $observer)
    {
        if (Mage::helper('loginredirect')->isEnabled()) {
            $_session = $this->_getSession();

            /* Check the user's group and do the redirection.*/
            if($this->_checkActionForCustomerGroup()) {
                $_session->setBeforeAuthUrl(Mage::helper('loginredirect')->getRedirectUrl());
            }
        }
    }


    protected function _checkActionForCustomerGroup()
    {
        /* @var $customer Mage_Customer_Model_Customer */
        $customer = $this->_getSession()->getCustomer();

        if($customer) {
            if($customer->getGroupId() == Mage::helper('loginredirect')->getConfigValue('group')) {
                return TRUE;
            }
        }

        return FALSE;
    }

    /**
     * @return Mage_Core_Model_Abstract
     */
    protected function _getSession()
    {
        return Mage::getSingleton('customer/session');
    }
}

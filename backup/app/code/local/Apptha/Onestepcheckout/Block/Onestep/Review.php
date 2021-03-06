<?php
/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.apptha.com/LICENSE.txt
 *
 * ==============================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * ==============================================================
 * This package designed for Magento COMMUNITY edition
 * Apptha does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * Apptha does not provide extension support in case of
 * incorrect edition usage.
 * ==============================================================
 *
 * @category    Apptha
 * @package     Apptha_Marketplace
 * @version     1.9.2
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2016 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 *
 */
/**
 * Manage cart items
 * This class is used to get onestep checkout
 * all cart items
 * and total amount of cart items
 */
class Apptha_Onestepcheckout_Block_Onestep_Review extends Mage_Checkout_Block_Onepage_Abstract {
    protected function _construct() {
        $this->getCheckout ()->setStepData ( 'review', array (
                'label' => Mage::helper ( 'checkout' )->__ ( 'Order Review' ),
                'is_show' => $this->isShow ()
        ) );
        parent::_construct ();

        $this->getQuote ()->collectTotals ()->save ();
    }
    /**
     * Get all items in cart
     *
     * @return string
     */
    public function getItems() {
        return $this->getQuote ()->getAllVisibleItems ();
    }
    /**
     * Get total amount of cart items
     *
     * @return int
     */
    public function getTotals() {
        return $this->getQuote ()->getTotals ();
    }
}

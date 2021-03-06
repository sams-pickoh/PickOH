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
 * @version     1.9.0
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2015 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 *
 */
/**
 * Checkout Review
 * This class is used for getting cart items and and total cart items
 */
class Apptha_Onestepcheckout_Block_Onestep_Review_Info extends Mage_Checkout_Block_Onepage_Review_Info {
    /**
     * Get all items in cart
     *
     * @return string
     */
    public function getItems() {
        return Mage::getSingleton ( 'checkout/session' )->getQuote ()->getAllVisibleItems ();
    }
    /**
     * Get cart total
     *
     * @return int
     */
    public function getTotals() {
        return Mage::getSingleton ( 'checkout/session' )->getQuote ()->getTotals ();
    }
}

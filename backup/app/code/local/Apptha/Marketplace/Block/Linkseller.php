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
 * Get Seller info
 * Getting the seller information,
 * seller product information using seller unique id
 */
class Apptha_Marketplace_Block_Linkseller extends Mage_Core_Block_Template {
    /**
     * Function to get the seller profile data
     * Passed the seller id as $sellerId to get particular seller info
     * @param int $sellerId
     * @return varchar
     */
    public function sellerdisplay($sellerId) {
        /**
         * load seller object by seller id
         */
        return Mage::getModel ( 'marketplace/sellerprofile' )->load ( $sellerId, 'seller_id' );
    }
    /**
     * Function to get show profile information
     * Passed the seller id as $sellerId to get particular seller info
     * @param int $sellerId
     * @return int
     */
    public function sellerprofiledisplay($sellerId) {
        /**
         * load seller object by seller id
         */
        $collection = Mage::getModel ( 'marketplace/sellerprofile' )->load ( $sellerId, 'seller_id' );
        return $collection->getShowProfile ();
    }
    /**
     * Function to get seller product
     * Passed the seller id as $sellerId to get particular seller products
     * @param int $sellerId
     * @return  products of the seller
     */
    public function sellerproduct($sellerid,$productId) {
        /**
         * Get Product Collection
         */
         $sellerProducts=Mage::getModel ( 'catalog/product' )->getCollection ()->addFieldToFilter ( 'seller_id', $sellerid )
        ->addFieldToFilter ( 'entity_id', array (
                'neq' => $productId
        ) )->addFieldToFilter ( 'status', 1 );
        $sellerProducts->getSelect ()->limit ( 4 );
        return $sellerProducts;
        
    }
    /**
     *
     * Function to get fifth star rating
     * @return string
     */
    public function getFifthStar($individualStar,$fifthStar){
        if($individualStar['rating'] == 5) {
           return  $fifthStar + 1;
        }
    }
    /**
     * Function to get Countries
     * @return object
     */
    public function getAllCountries(){
        return Mage::getResourceModel('directory/country_collection')->loadData()->toOptionArray(false);
    }
    /**
     * Function to get target path
     * @return object
     */
    public function getSellerPageTargetPath($targetPath){
       return Mage::getModel ( 'core/url_rewrite' )->load ( $targetPath, 'target_path' );
    }
}
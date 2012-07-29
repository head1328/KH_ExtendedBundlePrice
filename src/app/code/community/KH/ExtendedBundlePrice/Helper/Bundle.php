<?php

class KH_ExtendedBundlePrice_Helper_Bundle extends Mage_Core_Helper_Abstract {

    /**
     * get catalog bundle block
     *
     * @param Mage_Catalog_Model_Product $product
     *
     * @return Mage_Bundle_Block_Catalog_Product_View_Type_Bundle
     */
    public function getBlock(Mage_Catalog_Model_Product $product) {
        /* @var $block Mage_Bundle_Block_Catalog_Product_View_Type_Bundle */
        $block = Mage::getSingleton('core/layout')->createBlock('bundle/catalog_product_view_type_bundle');
        $block->setProduct($product);

        return $block;
    }

    /**
     * validate selection
     *
     * @param mixed $selection
     *
     * @return bool
     */
    public function isValid($selection) {
        return $selection->getSelectionQty() && ! $selection->getSelectionCanChangeQty();
    }
}

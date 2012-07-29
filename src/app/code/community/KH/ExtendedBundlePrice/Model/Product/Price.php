<?php

class KH_ExtendedBundlePrice_Model_Product_Price extends Mage_Bundle_Model_Product_Price
{
    /**
     * get fixed price for bundle with dyn. prices only if
     *  - all options has ONLY one selection
     *  - defined as default
     *  - with default qty
     *  - and qty NOT editable
     *
     * @param Mage_Catalog_Model_Product $product
     *
     * @return string
     */
    public function getPrice($product)
    {
        if ($product->getPriceType() == self::PRICE_TYPE_FIXED) {
            return parent::getPrice($product);
        }

        /* @var $extendedBundleHelper KH_ExtendedBundlePrice_Helper_Bundle */
        $extendedBundleHelper = Mage::helper('extbundleprice/bundle');
        $priceModel = $product->getPriceModel();

        $price = 0;

        /* @var $option Mage_Bundle_Model_Option */
        foreach ($extendedBundleHelper->getBlock($product)->getOptions() as $option) {
            $selection = $option->getDefaultSelection();

            if ($selection === null) {
                continue;
            }

            if ($extendedBundleHelper->isValid($selection)) {
                $price += $priceModel->getSelectionPreFinalPrice(
                        $product, $selection, $selection->getSelectionQty());

            } else {
                // invalid configuration -> magento default behaviour
                return 0;
            }
        }

        return $price;
    }
}

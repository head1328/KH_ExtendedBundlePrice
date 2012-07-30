KH_ExtendedBundlePrice
======================

Description
-----------

Get fixed price for bundle with dyn. prices only if:
* all options has ONLY one selection
* defined as default
* with default qty
* and qty NOT editable

Why? Because Magento shows up a 0,- price for all Bundle-Products with dynamic prices. This generates a fixed price which can be used for final configured bundles.

Requirements
------------

Tested with magento 1.7

Installation
------------

Just copy all files under /src to /app or use modman

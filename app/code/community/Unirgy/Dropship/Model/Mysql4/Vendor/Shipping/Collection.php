<?php
/**
 * Unirgy LLC
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.unirgy.com/LICENSE-M1.txt
 *
 * @category   Unirgy
 * @package    Unirgy_Dropship
 * @copyright  Copyright (c) 2008-2009 Unirgy LLC (http://www.unirgy.com)
 * @license    http:///www.unirgy.com/LICENSE-M1.txt
 */

class Unirgy_Dropship_Model_Mysql4_Vendor_Shipping_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('udropship/vendor_shipping');
        parent::_construct();
    }

    public function addVendorFilter($vendorId)
    {
        $this->getSelect()->where('vendor_id=?', $vendorId);
        return $this;
    }

    public function joinShipping()
    {
        $this->getSelect()->join(
            array('shipping'=>$this->getTable('shipping')),
            'shipping.shipping_id=main_table.shipping_id',
            array('shipping_code', 'shipping_title')
        );
        return $this;
    }
}
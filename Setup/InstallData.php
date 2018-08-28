<?php
/**
 * Created by PhpStorm.
 * User: lionelgabaude
 * Date: 7/17/18
 * Time: 3:37 PM
 */

namespace Mageandmore\CustomerOrdersFix\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_grid'),
            'base_to_order_rate',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
                'length' => '12,4',
                'nullable' => true,
                'comment' => 'Base To Order Rate'
            ]
        );

        $sql = "UPDATE sales_order_grid g
                LEFT JOIN sales_order s ON g.entity_id = s.entity_id
                SET g.base_to_order_rate = s.base_to_order_rate";
        $res = $setup->getConnection()->query($sql);
    }

}
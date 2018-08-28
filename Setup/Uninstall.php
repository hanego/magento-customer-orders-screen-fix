<?php
namespace Mageandmore\CustomerOrdersFix\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\UninstallInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class Uninstall implements UninstallInterface
{

    public function uninstall(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {

        $setup->getConnection()->dropColumn(
            'sales_order_grid',
            'base_to_order_rate'
        );
    }
}
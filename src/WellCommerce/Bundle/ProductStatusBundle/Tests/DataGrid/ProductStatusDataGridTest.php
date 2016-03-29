<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\ProductStatusBundle\Tests\DataGrid;

use WellCommerce\Bundle\CoreBundle\Test\DataGrid\AbstractDataGridTestCase;

/**
 * Class ProductStatusDataGridTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductStatusDataGridTest extends AbstractDataGridTestCase
{
    protected function get()
    {
        return $this->container->get('product_status.datagrid')->getInstance();
    }

    protected function getColumns()
    {
        return ['id', 'name'];
    }
}

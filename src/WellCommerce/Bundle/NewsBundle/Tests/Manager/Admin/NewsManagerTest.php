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

namespace WellCommerce\Bundle\NewsBundle\Tests\Manager\Admin;

use WellCommerce\Bundle\CoreBundle\Test\Manager\Admin\AbstractAdminManagerTestCase;

/**
 * Class NewsManagerTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class NewsManagerTest extends AbstractAdminManagerTestCase
{
    protected function get()
    {
        return $this->container->get('news.manager.admin');
    }

    protected function getServiceClassName()
    {
        return \WellCommerce\Bundle\NewsBundle\Manager\Admin\NewsManager::class;
    }
    
    protected function getFormBuilderClassName()
    {
        return \WellCommerce\Bundle\NewsBundle\Form\Admin\NewsFormBuilder::class;
    }

    protected function getDataGridClassName()
    {
        return \WellCommerce\Bundle\NewsBundle\DataGrid\NewsDataGrid::class;
    }

    protected function getRepositoryInterfaceName()
    {
        return \WellCommerce\Bundle\NewsBundle\Repository\NewsRepositoryInterface::class;
    }
}

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

namespace WellCommerce\Bundle\ClientBundle\Tests\Manager\Admin;

use WellCommerce\Bundle\CoreBundle\Test\Manager\Admin\AbstractAdminManagerTestCase;

/**
 * Class ClientGroupManagerTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ClientGroupManagerTest extends AbstractAdminManagerTestCase
{
    protected function get()
    {
        return $this->container->get('client_group.manager.admin');
    }

    protected function getServiceClassName()
    {
        return \WellCommerce\Bundle\ClientBundle\Manager\Admin\ClientGroupManager::class;
    }

    protected function getFormBuilderClassName()
    {
        return \WellCommerce\Bundle\ClientBundle\Form\Admin\ClientGroupFormBuilder::class;
    }

    protected function getDataGridClassName()
    {
        return \WellCommerce\Bundle\ClientBundle\DataGrid\ClientGroupDataGrid::class;
    }

    protected function getRepositoryInterfaceName()
    {
        return \WellCommerce\Bundle\ClientBundle\Repository\ClientGroupRepositoryInterface::class;
    }
}

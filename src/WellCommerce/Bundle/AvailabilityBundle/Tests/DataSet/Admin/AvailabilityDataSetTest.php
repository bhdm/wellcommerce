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

namespace WellCommerce\Bundle\AvailabilityBundle\Tests\DataSet\Admin;

use WellCommerce\Bundle\CoreBundle\Test\DataSet\AbstractDataSetTestCase;

/**
 * Class AvailabilityDataSetTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class AvailabilityDataSetTest extends AbstractDataSetTestCase
{
    protected function get()
    {
        return $this->container->get('availability.dataset.admin');
    }

    protected function getColumns()
    {
        return [
            'id'   => 'availability.id',
            'name' => 'availability_translation.name',
        ];
    }
}

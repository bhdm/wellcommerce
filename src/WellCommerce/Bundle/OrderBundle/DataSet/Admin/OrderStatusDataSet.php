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

namespace WellCommerce\Bundle\OrderBundle\DataSet\Admin;

use WellCommerce\Bundle\CoreBundle\DataSet\AbstractDataSet;
use WellCommerce\Component\DataSet\Configurator\DataSetConfiguratorInterface;

/**
 * Class OrderStatusDataSet
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class OrderStatusDataSet extends AbstractDataSet
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(DataSetConfiguratorInterface $configurator)
    {
        $configurator->setColumns([
            'id'        => 'order_status.id',
            'name'      => 'order_status_translation.name',
            'createdAt' => 'order_status.createdAt',
            'groupName' => 'order_status_group_translation.name',
        ]);

        $configurator->setColumnTransformers([
            'createdAt' => $this->getDataSetTransformer('date', ['format' => 'Y-m-d H:i:s']),
        ]);
    }
}

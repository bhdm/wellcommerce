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

namespace WellCommerce\Bundle\CategoryBundle\DataSet\Front;

use WellCommerce\Bundle\CategoryBundle\DataSet\Admin\CategoryDataSetQueryBuilder as BaseQueryBuilder;
use WellCommerce\Component\DataSet\Conditions\Condition\Eq;

/**
 * Class CategoryDataSetQueryBuilder
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class CategoryDataSetQueryBuilder extends BaseQueryBuilder
{
    protected function getConditions()
    {
        $conditions = parent::getConditions();
        $conditions->add(new Eq('enabled', true));

        return $conditions;
    }
}

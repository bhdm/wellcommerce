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

namespace WellCommerce\Bundle\ProductBundle\Repository;

/**
 * Interface ProductCollectionAwareRepositoryInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ProductCollectionAwareRepositoryInterface
{
    /**
     * Return product collection query builder
     *
     * @return mixed
     */
    public function getProductCollectionQueryBuilder();
}

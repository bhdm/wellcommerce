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

namespace WellCommerce\Bundle\CoreBundle\Service\Breadcrumb;

/**
 * Interface BreadcrumbItemCollection
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface BreadcrumbItemCollectionInterface
{
    /**
     * Adds new item to breadcrumb
     *
     * @param BreadcrumbItemInterface $item
     */
    public function add(BreadcrumbItemInterface $item);

    /**
     * Returns all breadcrumbs as an array
     *
     * @return BreadcrumbItemInterface[]
     */
    public function all();
}

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

namespace WellCommerce\Bundle\SearchBundle\Indexer;

use WellCommerce\Bundle\ProductBundle\Entity\ProductInterface;

/**
 * Interface ProductIndexerInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ProductIndexerInterface
{
    const DEFAULT_INDEX_NAME = 'products';

    /**
     * Adds a product to index
     *
     * @param ProductInterface $product
     */
    public function addProduct(ProductInterface $product, $indexName = self::DEFAULT_INDEX_NAME);

    public function reindexProducts();
}

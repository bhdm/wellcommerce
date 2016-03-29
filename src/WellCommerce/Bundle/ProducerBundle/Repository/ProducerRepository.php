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
namespace WellCommerce\Bundle\ProducerBundle\Repository;

use WellCommerce\Bundle\DoctrineBundle\Repository\AbstractEntityRepository;

/**
 * Class ProducerRepository
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProducerRepository extends AbstractEntityRepository implements ProducerRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getDataSetQueryBuilder()
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->groupBy('producer.id');
        $queryBuilder->leftJoin('producer.translations', 'producer_translation');
        $queryBuilder->leftJoin('producer.products', 'producer_products');
        $queryBuilder->leftJoin('producer.shops', 'producer_shops');

        return $queryBuilder;
    }
}

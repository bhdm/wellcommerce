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
namespace WellCommerce\Bundle\LocaleBundle\Repository;

use Symfony\Component\Intl\Intl;
use WellCommerce\Bundle\DoctrineBundle\Repository\AbstractEntityRepository;

/**
 * Class LocaleRepository
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LocaleRepository extends AbstractEntityRepository implements LocaleRepositoryInterface
{
    private $currentLocales = [];

    /**
     * {@inheritdoc}
     */
    public function getDataSetQueryBuilder()
    {
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->groupBy('locale.id');
        $queryBuilder->leftJoin('locale.currency', 'default_currency');

        return $queryBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function getAvailableLocaleCodes()
    {
        if (empty($this->currentLocales)) {
            $this->currentLocales = $this->getAvailableLocales();
        }

        $codes = [];

        foreach ($this->currentLocales as $locale) {
            $codes[$locale['code']] = $locale['code'];
        }

        return $codes;
    }

    /**
     * {@inheritdoc}
     */
    public function getAvailableLocales()
    {
        $qb    = $this->createQueryBuilder('locale');
        $query = $qb->getQuery();

        return $query->getArrayResult();
    }

    /**
     * {@inheritdoc}
     */
    public function getLocaleNames()
    {
        $locales = Intl::getLocaleBundle()->getLocaleNames();

        $Data = [];

        foreach ($locales as $locale => $name) {
            $Data[$locale] = sprintf('%s (%s)', $name, $locale);
        }

        return $Data;
    }
}

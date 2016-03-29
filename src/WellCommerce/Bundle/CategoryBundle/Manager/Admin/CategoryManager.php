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

namespace WellCommerce\Bundle\CategoryBundle\Manager\Admin;

use WellCommerce\Bundle\CategoryBundle\Entity\Category;
use WellCommerce\Bundle\CoreBundle\Helper\Sluggable;
use WellCommerce\Bundle\CoreBundle\Manager\Admin\AbstractAdminManager;
use WellCommerce\Bundle\LocaleBundle\Entity\Locale;

/**
 * Class CategoryManager
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CategoryManager extends AbstractAdminManager
{
    /**
     * Sorts categories passed in request
     *
     * @param array $items
     */
    public function sortCategories(array $items)
    {
        $repository = $this->getRepository();
        $em         = $this->getDoctrineHelper()->getEntityManager();

        foreach ($items as $item) {
            $parent = $repository->find($item['parent']);
            $child  = $repository->find($item['id']);
            if (null !== $child) {
                $child->setParent($parent);
                $child->setHierarchy($item['weight']);
                $em->persist($child);
            }
        }

        $em->flush();
    }

    /**
     * Adds a new category
     *
     * @param string $name
     * @param int    $parent
     *
     * @return Category
     */
    public function quickAddCategory($name, $parent)
    {
        $em             = $this->getDoctrineHelper()->getEntityManager();
        $currentShop    = $this->getShopContext()->getCurrentShop();
        $parentCategory = $this->getRepository()->find((int)$parent);

        $category = $this->getFactory()->create();
        $category->setParent($parentCategory);
        $category->addShop($currentShop);

        foreach ($this->getLocales() as $locale) {
            $this->translateCategory($locale, $category, $name);
        }

        $em->persist($category);
        $em->flush();

        return $category;
    }

    /**
     * Translates the category
     *
     * @param Locale   $locale
     * @param Category $category
     * @param string   $name
     */
    protected function translateCategory(Locale $locale, Category $category, $name)
    {
        /**
         * @var $translation \WellCommerce\Bundle\CategoryBundle\Entity\CategoryTranslation
         */
        $translation = $category->translate($locale->getCode());
        $slug        = $this->getLocaleSlug($locale, $name);
        $translation->setName($name);
        $translation->setSlug($slug);
        $category->mergeNewTranslations();
    }

    /**
     * Returns category slug
     *
     * @param Locale $locale
     * @param string $categoryName
     *
     * @return mixed|string
     */
    protected function getLocaleSlug(Locale $locale, $categoryName)
    {
        $slug          = Sluggable::makeSlug($categoryName);
        $currentLocale = $this->getRequestHelper()->getCurrentLocale();
        if ($locale->getCode() != $currentLocale) {
            $slug = Sluggable::makeSlug(sprintf('%s-%s', $categoryName, $locale->getCode()));
        }

        return $slug;
    }
}

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

namespace WellCommerce\Bundle\DictionaryBundle\Factory;

use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;
use WellCommerce\Bundle\DictionaryBundle\Entity\DictionaryInterface;

/**
 * Class DictionaryFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class DictionaryFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = DictionaryInterface::class;

    /**
     * @return DictionaryInterface
     */
    public function create()
    {
        /** @var $dictionary DictionaryInterface */
        $dictionary = $this->init();
        $dictionary->setIdentifier('');

        return $dictionary;
    }
}

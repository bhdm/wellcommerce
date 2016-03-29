<?php

/*
 * This file is part of the Ivory Lucene Search package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\CountryBundle\DependencyInjection;

use WellCommerce\Bundle\CoreBundle\DependencyInjection\AbstractConfiguration;
use WellCommerce\Bundle\CoreBundle\DependencyInjection\WellCommerceCoreExtension;

/**
 * Class Configuration
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class Configuration extends AbstractConfiguration
{
    protected $treeRoot = WellCommerceCoreExtension::EXTENSION_NAME;
}

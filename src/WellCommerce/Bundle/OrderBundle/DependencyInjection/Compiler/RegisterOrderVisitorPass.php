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

namespace WellCommerce\Bundle\OrderBundle\DependencyInjection\Compiler;

use WellCommerce\Bundle\CoreBundle\DependencyInjection\Compiler\AbstractCollectionPass;

/**
 * Class RegisterOrderVisitorPass
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class RegisterOrderVisitorPass extends AbstractCollectionPass
{
    /**
     * @var string
     */
    protected $collectionServiceId = 'order.visitor.collection';

    /**
     * @var string
     */
    protected $serviceTag = 'order.visitor';
}

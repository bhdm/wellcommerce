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

namespace WellCommerce\Bundle\PaymentBundle\DependencyInjection\Compiler;

use WellCommerce\Bundle\CoreBundle\DependencyInjection\Compiler\AbstractCollectionPass;

/**
 * Class RegisterPaymentMethodProcessorPass
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class RegisterPaymentMethodProcessorPass extends AbstractCollectionPass
{
    /**
     * @var string
     */
    protected $collectionServiceId = 'payment_method.processor.collection';

    /**
     * @var string
     */
    protected $serviceTag = 'payment_method.processor';
}

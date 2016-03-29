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

namespace WellCommerce\Component\DataGrid\Configuration\EventHandler;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CustomRowEventHandler
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CustomRowEventHandler extends AbstractRowEventHandler
{
    /**
     * {@inheritdoc}
     */
    public function getFunctionName()
    {
        return $this->get('function_name');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setRequired([
            'function_name',
        ]);

        $resolver->setAllowedTypes('function_name', 'string');
    }

    /**
     * {@inheritdoc}
     */
    public function isCustomEvent()
    {
        return true;
    }
}

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

namespace WellCommerce\Bundle\ThemeBundle\Tests\DependencyInjection;

use WellCommerce\Bundle\CoreBundle\Test\DependencyInjection\AbstractExtensionTestCase;

/**
 * Class ThemeExtensionTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ThemeExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @return array
     */
    public function getRequiredServices()
    {
        return [
            'services' => [
                [
                    'theme.repository',
                    'theme.factory',
                    'theme.event_dispatcher',
                    'theme.form_builder.admin',
                    'theme.dataset.admin',
                    'theme.datagrid',
                    'theme.controller.admin',
                ]
            ],
        ];
    }
}

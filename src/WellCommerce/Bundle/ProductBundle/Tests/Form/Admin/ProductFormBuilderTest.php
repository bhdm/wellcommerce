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

namespace WellCommerce\Bundle\ProductBundle\Tests\Form\Admin;

use WellCommerce\Bundle\CoreBundle\Test\Form\AbstractFormBuilderTestCase;

/**
 * Class ProductFormBuilderTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductFormBuilderTest extends AbstractFormBuilderTestCase
{
    protected function getFormBuilderService()
    {
        return $this->container->get('product.form_builder.admin');
    }

    protected function getFactoryService()
    {
        return $this->container->get('product.factory');
    }
}

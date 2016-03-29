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

namespace WellCommerce\Bundle\UnitBundle\Tests\Entity;

use WellCommerce\Bundle\CoreBundle\Test\Entity\AbstractEntityTestCase;
use WellCommerce\Bundle\UnitBundle\Entity\Unit;

/**
 * Class UnitTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class UnitTest extends AbstractEntityTestCase
{
    public function testNewEntityPassesValidation()
    {
        $entity = new Unit();
        $entity->translate('en')->setName('Test');
        $entity->mergeNewTranslations();

        $errors = $this->validator->validate($entity);
        $this->assertEquals(0, count($errors));
    }

    public function testEntityRequiresNonEmptyName()
    {
        $entity = new Unit();
        $entity->translate('en')->setName('');
        $entity->mergeNewTranslations();

        $errors = $this->validator->validate($entity);
        $this->assertEquals(1, count($errors));
    }
}

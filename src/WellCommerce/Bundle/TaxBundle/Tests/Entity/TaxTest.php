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

namespace WellCommerce\Bundle\TaxBundle\Tests\Entity;

use WellCommerce\Bundle\CoreBundle\Test\Entity\AbstractEntityTestCase;
use WellCommerce\Bundle\TaxBundle\Entity\Tax;

/**
 * Class TaxTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class TaxTest extends AbstractEntityTestCase
{
    public function testNewEntityPassesValidation()
    {
        $entity = new Tax();
        $entity->setValue(10);
        $entity->translate('en')->setName('Test');
        $entity->mergeNewTranslations();

        $errors = $this->validator->validate($entity);
        $this->assertEquals(0, count($errors));
    }

    public function testValidationFailsIfEmptyName()
    {
        $entity = new Tax();
        $entity->setValue(10);
        $entity->translate('en')->setName('');
        $entity->mergeNewTranslations();

        $errors = $this->validator->validate($entity);
        $this->assertEquals(1, count($errors));
    }

    public function testValidationFailsIfWrongValue()
    {
        $entity = new Tax();
        $entity->setValue(-10);
        $entity->translate('en')->setName('Test');
        $entity->mergeNewTranslations();

        $errors = $this->validator->validate($entity);
        $this->assertEquals(1, count($errors));
    }
}

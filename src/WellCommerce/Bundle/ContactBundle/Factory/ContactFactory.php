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

namespace WellCommerce\Bundle\ContactBundle\Factory;

use WellCommerce\Bundle\ContactBundle\Entity\ContactInterface;
use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;

/**
 * Class ContactFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ContactFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = ContactInterface::class;

    /**
     * @return ContactInterface
     */
    public function create()
    {
        /** @var $contact ContactInterface */
        $contact = $this->init();
        $contact->setCreatedAt(new \DateTime());

        return $contact;
    }
}

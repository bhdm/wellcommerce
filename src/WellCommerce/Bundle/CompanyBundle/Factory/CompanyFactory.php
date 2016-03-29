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

namespace WellCommerce\Bundle\CompanyBundle\Factory;

use WellCommerce\Bundle\CompanyBundle\Entity\CompanyAddress;
use WellCommerce\Bundle\CompanyBundle\Entity\CompanyInterface;
use WellCommerce\Bundle\CoreBundle\Factory\AbstractFactory;

/**
 * Class CompanyFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CompanyFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $supportsInterface = CompanyInterface::class;

    /**
     * @return CompanyInterface
     */
    public function create()
    {
        /** @var $company CompanyInterface */
        $company = $this->init();
        $company->setName('');
        $company->setShortName('');
        $company->setAddress(new CompanyAddress());

        return $company;
    }
}

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

namespace WellCommerce\Bundle\ReportBundle\Generator;

use Doctrine\Common\Collections\Collection;
use WellCommerce\Bundle\ReportBundle\Configuration\ReportConfiguration;

/**
 * Class SalesReportGenerator
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class SalesReportGenerator
{
    public function __construct(Collection $collection, ReportConfiguration $configuration)
    {

    }

    public function getSummary()
    {

    }
}

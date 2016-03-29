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

/**
 * Class OpenContextMenu
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class OpenContextMenuEventHandler extends AbstractEventHandler
{
    /**
     * {@inheritdoc}
     */
    public function getFunctionName()
    {
        return 'open_context_menu';
    }
}

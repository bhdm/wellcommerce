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
namespace WellCommerce\Bundle\LocaleBundle\Twig\Extension;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use WellCommerce\Component\DataSet\DataSetInterface;

/**
 * Class LocaleExtension
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LocaleExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /**
     * @var SessionInterface
     */
    protected $session;

    /**
     * @var DataSetInterface
     */
    protected $dataset;

    /**
     * Constructor
     *
     * @param SessionInterface $session
     */
    /**
     * Constructor
     *
     * @param SessionInterface $session
     * @param DataSetInterface $dataset
     */
    public function __construct(SessionInterface $session, DataSetInterface $dataset)
    {
        $this->session = $session;
        $this->dataset = $dataset;
    }

    /**
     * {@inheritdoc}
     */
    public function getGlobals()
    {
        return [
            'locales' => $this->dataset->getResult('select', ['order_by' => 'code'], [
                'label_column' => 'code',
                'value_column' => 'code'
            ])
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'locale';
    }
}

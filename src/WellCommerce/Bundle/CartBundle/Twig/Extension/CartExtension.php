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
namespace WellCommerce\Bundle\CartBundle\Twig\Extension;

use WellCommerce\Bundle\CartBundle\Context\Front\CartContextInterface;
use WellCommerce\Component\DataSet\DataSetInterface;

/**
 * Class CategoryExtension
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CartExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /**
     * @var CartContextInterface
     */
    protected $cartContext;

    /**
     * @var DataSetInterface
     */
    protected $cartProductDataSet;

    /**
     * Constructor
     *
     * @param CartContextInterface $cartContext
     * @param DataSetInterface     $dataset
     */
    public function __construct(CartContextInterface $cartContext, DataSetInterface $dataset)
    {
        $this->cartContext        = $cartContext;
        $this->cartProductDataSet = $dataset;
    }

    public function getGlobals()
    {
        return [
            'cart'         => $this->cartContext->getCurrentCart(),
            'cartProducts' => $this->cartProductDataSet->getResult('array')
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'cart';
    }
}

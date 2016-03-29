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

namespace WellCommerce\Bundle\OrderBundle\Form\DataTransformer;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\PropertyAccess\PropertyPathInterface;
use WellCommerce\Bundle\CoreBundle\Form\DataTransformer\CollectionToArrayTransformer;
use WellCommerce\Bundle\OrderBundle\Entity\OrderInterface;
use WellCommerce\Bundle\OrderBundle\Entity\OrderProductInterface;
use WellCommerce\Bundle\OrderBundle\Manager\Admin\OrderProductManager;
use WellCommerce\Bundle\ProductBundle\Entity\ProductAttributeInterface;

/**
 * Class OrderProductCollectionToArrayTransformer
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class OrderProductCollectionToArrayTransformer extends CollectionToArrayTransformer
{
    /**
     * @var OrderProductManager
     */
    protected $manager;

    /**
     * @param OrderProductManager $manager
     */
    public function setOrderProductManager(OrderProductManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($modelData)
    {
        $values = [];

        if ($modelData instanceof Collection) {
            $modelData->map(function (OrderProductInterface $orderProduct) use (&$values) {

                $variantId = $this->getVariantId($orderProduct->getProductAttribute());

                $values[] = [
                    'id'               => $orderProduct->getId(),
                    'product_id'       => $orderProduct->getProduct()->getId(),
                    'product_name'     => $orderProduct->getProduct()->translate()->getName(),
                    'gross_amount'     => $orderProduct->getSellPrice()->getGrossAmount(),
                    'quantity'         => $orderProduct->getQuantity(),
                    'ean'              => $orderProduct->getProduct()->getSku(),
                    'previousquantity' => $orderProduct->getQuantity(),
                    'trackstock'       => $orderProduct->getProduct()->getTrackStock(),
                    'tax_rate'         => $orderProduct->getSellPrice()->getTaxRate(),
                    'tax_value'        => $orderProduct->getSellPrice()->getTaxAmount(),
                    'previousvariant'  => $variantId,
                    'variant'          => $variantId,
                    'weight'           => $orderProduct->getWeight(),
                    'stock'            => $orderProduct->getProduct()->getStock()
                ];
            });
        }

        return $values;
    }

    protected function getVariantId(ProductAttributeInterface $attribute = null)
    {
        if (null === $attribute) {
            return 0;
        }

        return $attribute->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($modelData, PropertyPathInterface $propertyPath, $values)
    {
        if ($modelData instanceof OrderInterface) {
            foreach ($values as $product) {
                $this->manager->addUpdateOrderProduct($product, $modelData);
            }
        }
    }
}

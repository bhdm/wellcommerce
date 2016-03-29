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

namespace WellCommerce\Component\DataSet\Configurator;

use WellCommerce\Component\DataSet\Column\Column;
use WellCommerce\Component\DataSet\Column\ColumnCollection;
use WellCommerce\Component\DataSet\DataSetInterface;
use WellCommerce\Component\DataSet\Transformer\ColumnTransformerCollection;

/**
 * Class DataSetConfigurator
 *
 * @author Adam Piotrowski <adam@wellcommerce.org>
 */
class DataSetConfigurator implements DataSetConfiguratorInterface
{
    /**
     * @var DataSetInterface
     */
    protected $dataset;

    /**
     * {@inheritdoc}
     */
    public function configure(DataSetInterface $dataset)
    {
        $this->dataset = $dataset;
        $dataset->configureOptions($this);
        $dataset->dispatchOnDataSetInitEvent();
    }

    /**
     * {@inheritdoc}
     */
    public function setColumns(array $columns = [])
    {
        $collection = new ColumnCollection();

        foreach ($columns as $alias => $source) {
            $collection->add(new Column([
                'alias'  => $alias,
                'source' => $source,
            ]));
        }

        $this->dataset->setColumns($collection);
    }

    /**
     * {@inheritdoc}
     */
    public function setColumnTransformers(array $transformers = [])
    {
        $collection = new ColumnTransformerCollection();
        foreach ($transformers as $column => $transformer) {
            $collection->add($column, $transformer);
        }

        $this->dataset->setDefaultContextOption('column_transformers', $collection);
    }
}

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

namespace WellCommerce\Bundle\ApiBundle\Tests\Controller;

use WellCommerce\Bundle\ApiBundle\Request\RequestHandlerInterface;
use WellCommerce\Bundle\CoreBundle\Test\AbstractTestCase;
use WellCommerce\Component\DataSet\Conditions\ConditionsCollection;

/**
 * Class ApiControllerTest
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ApiControllerTest extends AbstractTestCase
{
    protected $apiKey;

    public function testListAction()
    {
        $this->apiKey = $this->getApiKey();

        foreach ($this->getRequestHandlers() as $requestHandler) {
            $this->runRequestHandlerIndexTest($requestHandler);
        }
    }

    public function testGetAction()
    {
        $this->apiKey = $this->getApiKey();

        foreach ($this->getRequestHandlers() as $requestHandler) {
            $this->runRequestHandlerGetTest($requestHandler);
        }
    }

    protected function runRequestHandlerIndexTest(RequestHandlerInterface $requestHandler)
    {
        $dataset    = $requestHandler->getDataset();
        $serializer = $requestHandler->getSerializer();

        $result = $dataset->getResult('array', [
            'limit'      => 10,
            'page'       => 1,
            'order_by'   => 'id',
            'order_dir'  => 'asc',
            'conditions' => new ConditionsCollection()
        ]);

        $data = $serializer->serialize($result, 'json');

        $url = $this->generateUrl('api.resource.list', [
            'resourceType' => $requestHandler->getResourceType(),
            'apiKey'       => $this->apiKey
        ]);

        $this->client->request('GET', $url);

        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertEquals($data, $this->client->getResponse()->getContent(), sprintf(
            'Wrong "list" response received for %s',
            $requestHandler->getResourceType()
        ));
    }

    protected function runRequestHandlerGetTest(RequestHandlerInterface $requestHandler)
    {
        $result = $requestHandler->getManager()->getRepository()->findOneBy([]);
        if (null !== $result) {
            $data = $requestHandler->getSerializer()->serialize($result, 'json', ['group' => $requestHandler->getResourceType()]);

            $url = $this->generateUrl('api.resource.get', [
                'resourceType' => $requestHandler->getResourceType(),
                'identifier'   => $result->getId(),
                'apiKey'       => $this->apiKey
            ]);

            $this->client->request('GET', $url);
            $this->assertTrue($this->client->getResponse()->isSuccessful());
            $this->assertEquals($data, $this->client->getResponse()->getContent(), sprintf(
                'Wrong "get" response received for %s',
                $requestHandler->getResourceType()
            ));
        }
    }

    /**
     * @return \WellCommerce\Bundle\ApiBundle\Request\RequestHandlerInterface[]
     */
    protected function getRequestHandlers()
    {
        return $this->container->get('api.request_handler.collection')->all();
    }

    /**
     * Returns an URL generated for route
     *
     * @param string     $routeName
     * @param array      $params
     * @param bool|false $absolute
     *
     * @return string
     */
    protected function generateUrl($routeName, array $params = [], $absolute = false)
    {
        return $this->container->get('router')->generate($routeName, $params, $absolute);
    }

    protected function getApiKey()
    {
        return $this->container->get('user.repository')->findOneBy([])->getApiKey();
    }
}

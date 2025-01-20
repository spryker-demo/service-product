<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct;

use Orm\Zed\Sales\Persistence\SpySalesOrderItemQuery;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ServiceProductDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_PRODUCT = 'FACADE_PRODUCT';

    /**
     * @var string
     */
    public const FACADE_MERCHANT_SALES_ORDER = 'FACADE_MERCHANT_SALES_ORDER';

    /**
     * @var string
     */
    public const SERVICE_SERVICE_PRODUCT = 'SERVICE_SERVICE_PRODUCT';

    /**
     * @var string
     */
    public const QUERY_SALES_ORDER_ITEM = 'QUERY_SALES_ORDER_ITEM';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = $this->addProductFacade($container);
        $container = $this->addMerchantSalesOrderFacade($container);
        $container = $this->addServiceProductService($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container): Container
    {
        $container = $this->addSalesOrderItemQuery($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductFacade(Container $container): Container
    {
        $container->set(static::FACADE_PRODUCT, function (Container $container) {
            return $container->getLocator()->product()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addMerchantSalesOrderFacade(Container $container): Container
    {
        $container->set(static::FACADE_MERCHANT_SALES_ORDER, function (Container $container) {
            return $container->getLocator()->merchantSalesOrder()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addServiceProductService(Container $container): Container
    {
        $container->set(static::SERVICE_SERVICE_PRODUCT, function (Container $container) {
            return $container->getLocator()->serviceProduct()->service();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addSalesOrderItemQuery(Container $container): Container
    {
        $container->set(static::QUERY_SALES_ORDER_ITEM, $container->factory(function () {
            return SpySalesOrderItemQuery::create();
        }));

        return $container;
    }
}

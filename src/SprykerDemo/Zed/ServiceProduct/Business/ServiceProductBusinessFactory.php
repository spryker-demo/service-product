<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Checker\ServiceProductChecker;
use SprykerDemo\Zed\ServiceProduct\Business\Checker\ServiceProductCheckerInterface;
use SprykerDemo\Zed\ServiceProduct\Business\ShipmentGroup\ShipmentGroupMethodFilter;
use SprykerDemo\Zed\ServiceProduct\Business\ShipmentGroup\ShipmentGroupMethodFilterInterface;
use SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod\ShipmentMethodChecker;
use SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod\ShipmentMethodCheckerInterface;
use SprykerDemo\Zed\ServiceProduct\ServiceProductDependencyProvider;

/**
 * @method \SprykerDemo\Zed\ServiceProduct\ServiceProductConfig getConfig()
 */
class ServiceProductBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\ShipmentGroup\ShipmentGroupMethodFilterInterface
     */
    public function createShipmentGroupMethodFilter(): ShipmentGroupMethodFilterInterface
    {
        return new ShipmentGroupMethodFilter($this->createShipmentMethodChecker());
    }

    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod\ShipmentMethodCheckerInterface
     */
    public function createShipmentMethodChecker(): ShipmentMethodCheckerInterface
    {
        return new ShipmentMethodChecker($this->createServiceProductChecker());
    }

    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\Checker\ServiceProductCheckerInterface
     */
    public function createServiceProductChecker(): ServiceProductCheckerInterface
    {
        return new ServiceProductChecker(
            $this->getProductFacade(),
            $this->getConfig(),
        );
    }

    /**
     * @return \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    public function getProductFacade(): ProductFacadeInterface
    {
        return $this->getProvidedDependency(ServiceProductDependencyProvider::FACADE_PRODUCT);
    }
}

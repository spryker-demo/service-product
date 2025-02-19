<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\ServiceProduct;

use Spryker\Client\Kernel\AbstractFactory;
use SprykerDemo\Client\ServiceProduct\Expander\ProductViewServiceProductExpander;
use SprykerDemo\Client\ServiceProduct\Expander\ProductViewServiceProductExpanderInterface;
use SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface;

class ServiceProductFactory extends AbstractFactory
{
    /**
     * @return \SprykerDemo\Client\ServiceProduct\Expander\ProductViewServiceProductExpanderInterface
     */
    public function createProductViewServiceProductExpander(): ProductViewServiceProductExpanderInterface
    {
        return new ProductViewServiceProductExpander(
            $this->getServiceProductService(),
        );
    }

    /**
     * @return \SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface
     */
    public function getServiceProductService(): ServiceProductServiceInterface
    {
        return $this->getProvidedDependency(ServiceProductDependencyProvider::SERVICE_SERVICE_PRODUCT);
    }
}

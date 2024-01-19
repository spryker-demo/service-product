<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Checker;

use Exception;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use SprykerDemo\Zed\ServiceProduct\ServiceProductConfig;

class ServiceProductChecker implements ServiceProductCheckerInterface
{
    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected ProductFacadeInterface $productFacade;

    /**
     * @var \SprykerDemo\Zed\ServiceProduct\ServiceProductConfig
     */
    protected ServiceProductConfig $config;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     * @param \SprykerDemo\Zed\ServiceProduct\ServiceProductConfig $config
     */
    public function __construct(
        ProductFacadeInterface $productFacade,
        ServiceProductConfig $config
    ) {
        $this->productFacade = $productFacade;
        $this->config = $config;
    }

    /**
     * @param string $productConcreteSku
     *
     * @return bool
     */
    public function checkIsServiceProductBySku(string $productConcreteSku): bool
    {
        try {
            $productConcreteTransfer = $this->productFacade->getProductConcrete($productConcreteSku);

            return $this->checkIsServiceProductByAttributes($productConcreteTransfer->getAttributes());
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * @param array<string> $productAttributes
     *
     * @return bool
     */
    public function checkIsServiceProductByAttributes(array $productAttributes): bool
    {
        $serviceProductAttribute = $this->config->getServiceProductAttribute();
        if (!isset($productAttributes[$serviceProductAttribute])) {
            return false;
        }

        return $productAttributes[$serviceProductAttribute] === $this->config->getIsServiceProductAttributeValue();
    }
}

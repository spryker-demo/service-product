<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\ServiceProduct\Expander;

use Generated\Shared\Transfer\ProductViewTransfer;
use Generated\Shared\Transfer\RawProductAttributesTransfer;
use SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface;

class ProductViewServiceProductExpander implements ProductViewServiceProductExpanderInterface
{
    /**
     * @var \SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface
     */
    protected ServiceProductServiceInterface $serviceProductService;

    /**
     * @param \SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface $serviceProductService
     */
    public function __construct(ServiceProductServiceInterface $serviceProductService)
    {
        $this->serviceProductService = $serviceProductService;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductViewTransfer $productViewTransfer
     *
     * @return \Generated\Shared\Transfer\ProductViewTransfer
     */
    public function expand(ProductViewTransfer $productViewTransfer): ProductViewTransfer
    {
        $productAttributes = $productViewTransfer->getAttributes();
        if (!$productAttributes) {
            return $productViewTransfer;
        }

        $rawProductAttributesTransfer = (new RawProductAttributesTransfer())->setConcreteAttributes($productAttributes);
        $isServiceProduct = $this->serviceProductService->isServiceProduct($rawProductAttributesTransfer);

        return $productViewTransfer->setIsServiceProduct($isServiceProduct);
    }
}

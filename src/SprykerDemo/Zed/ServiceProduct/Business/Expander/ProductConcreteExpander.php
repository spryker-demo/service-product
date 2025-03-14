<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Expander;

use Generated\Shared\Transfer\ProductConcreteTransfer;
use SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetectorInterface;

class ProductConcreteExpander implements ProductConcreteExpanderInterface
{
    /**
     * @var \SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetectorInterface
     */
    protected ProductAttributeServiceProductDetectorInterface $productAttributeServiceProductDetector;

    /**
     * @param \SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetectorInterface $productAttributeServiceProductDetector
     */
    public function __construct(ProductAttributeServiceProductDetectorInterface $productAttributeServiceProductDetector)
    {
        $this->productAttributeServiceProductDetector = $productAttributeServiceProductDetector;
    }

    /**
     * @param array<\Generated\Shared\Transfer\ProductConcreteTransfer> $productConcreteTransfers
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteTransfer>
     */
    public function expandWithServiceProductFlag(array $productConcreteTransfers): array
    {
        foreach ($productConcreteTransfers as $productConcreteTransfer) {
            $this->expandProductConcrete($productConcreteTransfer);
        }

        return $productConcreteTransfers;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return void
     */
    protected function expandProductConcrete(ProductConcreteTransfer $productConcreteTransfer): void
    {
        $isServiceProduct = $this->productAttributeServiceProductDetector
            ->isServiceProduct($productConcreteTransfer->getAttributes());

        $productConcreteTransfer->setIsServiceProduct($isServiceProduct);
    }
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Expander;

use Generated\Shared\Transfer\ProductConcreteStorageTransfer;
use SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetectorInterface;

class ProductConcreteStorageExpander implements ProductConcreteStorageExpanderInterface
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
     * @param array<\Generated\Shared\Transfer\ProductConcreteStorageTransfer> $productConcreteStorageTransfers
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteStorageTransfer>
     */
    public function expandWithServiceProductFlag(array $productConcreteStorageTransfers): array
    {
        foreach ($productConcreteStorageTransfers as $productConcreteStorageTransfer) {
            $this->expandProductConcreteStorage($productConcreteStorageTransfer);
        }

        return $productConcreteStorageTransfers;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteStorageTransfer $productConcreteStorageTransfer
     *
     * @return void
     */
    protected function expandProductConcreteStorage(ProductConcreteStorageTransfer $productConcreteStorageTransfer): void
    {
        $isServiceProduct = $this->productAttributeServiceProductDetector
            ->isServiceProduct($productConcreteStorageTransfer->getAttributes());

        $productConcreteStorageTransfer->setIsServiceProduct($isServiceProduct);
    }
}

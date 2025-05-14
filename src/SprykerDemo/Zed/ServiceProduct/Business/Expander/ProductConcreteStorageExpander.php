<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Expander;

use Generated\Shared\Transfer\ProductConcreteStorageTransfer;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetectorInterface;

class ProductConcreteStorageExpander implements ProductConcreteStorageExpanderInterface
{
    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected ProductFacadeInterface $productFacade;

    /**
     * @var \SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetectorInterface
     */
    protected ProductAttributeServiceProductDetectorInterface $productAttributeServiceProductDetector;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     * @param \SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetectorInterface $productAttributeServiceProductDetector
     */
    public function __construct(
        ProductFacadeInterface $productFacade,
        ProductAttributeServiceProductDetectorInterface $productAttributeServiceProductDetector
    ) {
        $this->productFacade = $productFacade;
        $this->productAttributeServiceProductDetector = $productAttributeServiceProductDetector;
    }

    /**
     * @param array<\Generated\Shared\Transfer\ProductConcreteStorageTransfer> $productConcreteStorageTransfers
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteStorageTransfer>
     */
    public function expandWithServiceProductFlag(array $productConcreteStorageTransfers): array
    {
        $productConcreteAttributesIndexedByConcreteSkus = $this->getProductConcreteAttributesIndexedByConcreteSkus($productConcreteStorageTransfers);

        foreach ($productConcreteStorageTransfers as $productConcreteStorageTransfer) {
            $this->expandProductConcreteStorage($productConcreteStorageTransfer, $productConcreteAttributesIndexedByConcreteSkus);
        }

        return $productConcreteStorageTransfers;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteStorageTransfer $productConcreteStorageTransfer
     * @param array<string, array<string>> $productConcreteAttributesIndexedByConcreteSkus
     *
     * @return void
     */
    protected function expandProductConcreteStorage(
        ProductConcreteStorageTransfer $productConcreteStorageTransfer,
        array $productConcreteAttributesIndexedByConcreteSkus
    ): void {
        $productConcreteSku = $productConcreteStorageTransfer->getSku();
        if (!isset($productConcreteAttributesIndexedByConcreteSkus[$productConcreteSku])) {
            return;
        }

        $productConcreteAttributes = $productConcreteAttributesIndexedByConcreteSkus[$productConcreteSku];
        $isServiceProduct = $this->productAttributeServiceProductDetector
            ->isServiceProduct($productConcreteAttributes);

        $productConcreteStorageTransfer->setIsServiceProduct($isServiceProduct);
    }

    /**
     * @param array<\Generated\Shared\Transfer\ProductConcreteStorageTransfer> $productConcreteStorageTransfers
     *
     * @return array<string, array<string>>
     */
    protected function getProductConcreteAttributesIndexedByConcreteSkus(array $productConcreteStorageTransfers): array
    {
        $productConcreteSkus = [];
        foreach ($productConcreteStorageTransfers as $productConcreteStorageTransfer) {
            $productConcreteSkus[] = $productConcreteStorageTransfer->getSku();
        }

        $productConcretes = $this->productFacade->getRawProductConcreteTransfersByConcreteSkus($productConcreteSkus);
        $productConcreteAttributesIndexedByConcreteSkus = [];
        foreach ($productConcretes as $productConcreteTransfer) {
            $productConcreteAttributesIndexedByConcreteSkus[$productConcreteTransfer->getSku()] = $productConcreteTransfer->getAttributes();
        }

        return $productConcreteAttributesIndexedByConcreteSkus;
    }
}

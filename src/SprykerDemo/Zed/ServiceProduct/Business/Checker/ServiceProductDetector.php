<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Checker;

use Generated\Shared\Transfer\ProductConcreteTransfer;
use Generated\Shared\Transfer\RawProductAttributesTransfer;
use SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Reader\ServiceProductReaderInterface;

class ServiceProductDetector implements ServiceProductDetectorInterface
{
    /**
     * @var \SprykerDemo\Zed\ServiceProduct\Business\Reader\ServiceProductReaderInterface
     */
    protected ServiceProductReaderInterface $serviceProductReader;

    /**
     * @var \SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface
     */
    protected ServiceProductServiceInterface $serviceProductService;

    /**
     * @param \SprykerDemo\Zed\ServiceProduct\Business\Reader\ServiceProductReaderInterface $serviceProductReader
     * @param \SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface $serviceProductService
     */
    public function __construct(
        ServiceProductReaderInterface $serviceProductReader,
        ServiceProductServiceInterface $serviceProductService
    ) {
        $this->serviceProductReader = $serviceProductReader;
        $this->serviceProductService = $serviceProductService;
    }

    /**
     * @param int $idMerchantSalesOrderItem
     *
     * @return bool
     */
    public function checkMerchantOrderItemIsServiceProduct(int $idMerchantSalesOrderItem): bool
    {
        $productConcreteTransfer = $this->serviceProductReader->findProductConcreteByMerchantOrderItemId($idMerchantSalesOrderItem);
        if (!$productConcreteTransfer) {
            return false;
        }

        $rawProductAttributesTransfer = $this->createRawProductAttributesTransfer($productConcreteTransfer);

        return $this->serviceProductService->isServiceProduct($rawProductAttributesTransfer);
    }

    /**
     * @param int $idSalesOrderItem
     *
     * @return bool
     */
    public function checkSalesOrderItemIsServiceProduct(int $idSalesOrderItem): bool
    {
        $productConcreteTransfer = $this->serviceProductReader->findProductConcreteByIdSalesOrderItem($idSalesOrderItem);
        if (!$productConcreteTransfer) {
            return false;
        }

        $rawProductAttributesTransfer = $this->createRawProductAttributesTransfer($productConcreteTransfer);

        return $this->serviceProductService->isServiceProduct($rawProductAttributesTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return \Generated\Shared\Transfer\RawProductAttributesTransfer
     */
    protected function createRawProductAttributesTransfer(ProductConcreteTransfer $productConcreteTransfer): RawProductAttributesTransfer
    {
        return (new RawProductAttributesTransfer())->setConcreteAttributes($productConcreteTransfer->getAttributes());
    }
}

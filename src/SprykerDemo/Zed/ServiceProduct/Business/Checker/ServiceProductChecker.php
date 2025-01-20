<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Checker;

use SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Reader\ServiceProductReaderInterface;

class ServiceProductChecker implements ServiceProductCheckerInterface
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

        return $this->serviceProductService->isServiceProduct($productConcreteTransfer->getAttributes());
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

        return $this->serviceProductService->isServiceProduct($productConcreteTransfer->getAttributes());
    }
}

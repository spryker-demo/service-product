<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Checker;

use SprykerDemo\Zed\ServiceProduct\Business\Reader\ServiceProductReaderInterface;
use SprykerDemo\Zed\ServiceProduct\ServiceProductConfig;

class ServiceProductChecker implements ServiceProductCheckerInterface
{
    /**
     * @var \SprykerDemo\Zed\ServiceProduct\Business\Reader\ServiceProductReaderInterface
     */
    protected ServiceProductReaderInterface $serviceProductReader;

    /**
     * @param \SprykerDemo\Zed\ServiceProduct\Business\Reader\ServiceProductReaderInterface $serviceProductReader
     */
    public function __construct(ServiceProductReaderInterface $serviceProductReader)
    {
        $this->serviceProductReader = $serviceProductReader;
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

        return $this->checkIsServiceProductByAttributes($productConcreteTransfer->getAttributes());
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

        return $this->checkIsServiceProductByAttributes($productConcreteTransfer->getAttributes());
    }

    /**
     * @param array<string> $productAttributes
     *
     * @return bool
     */
    public function checkIsServiceProductByAttributes(array $productAttributes): bool
    {
        return isset($productAttributes[ServiceProductConfig::SERVICE_PRODUCT_ATTRIBUTE])
             && $productAttributes[ServiceProductConfig::SERVICE_PRODUCT_ATTRIBUTE] === ServiceProductConfig::IS_SERVICE_PRODUCT_ATTRIBUTE_VALUE;
    }
}

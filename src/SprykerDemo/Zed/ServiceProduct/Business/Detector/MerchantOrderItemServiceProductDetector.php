<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Detector;

use SprykerDemo\Zed\ServiceProduct\Business\Reader\MerchantOrderItemProductConcreteReaderInterface;

class MerchantOrderItemServiceProductDetector implements MerchantOrderItemServiceProductDetectorInterface
{
    /**
     * @var \SprykerDemo\Zed\ServiceProduct\Business\Reader\MerchantOrderItemProductConcreteReaderInterface
     */
    protected MerchantOrderItemProductConcreteReaderInterface $productReader;

    /**
     * @param \SprykerDemo\Zed\ServiceProduct\Business\Reader\MerchantOrderItemProductConcreteReaderInterface $productReader
     */
    public function __construct(MerchantOrderItemProductConcreteReaderInterface $productReader)
    {
        $this->productReader = $productReader;
    }

    /**
     * @param int $idMerchantSalesOrderItem
     *
     * @return bool
     */
    public function isServiceProduct(int $idMerchantSalesOrderItem): bool
    {
        $productConcreteTransfer = $this->productReader->findProductByIdMerchantSalesOrderItem($idMerchantSalesOrderItem);

        if (!$productConcreteTransfer) {
            return false;
        }

        return (bool)$productConcreteTransfer->getIsServiceProduct();
    }
}

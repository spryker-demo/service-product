<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Reader;

use Generated\Shared\Transfer\ProductConcreteTransfer;

interface ServiceProductReaderInterface
{
    /**
     * @param int $idMerchantSalesOrderItem
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer|null
     */
    public function findProductConcreteByMerchantOrderItemId(int $idMerchantSalesOrderItem): ?ProductConcreteTransfer;

    /**
     * @param int $idSalesOrderItem
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer|null
     */
    public function findProductConcreteByIdSalesOrderItem(int $idSalesOrderItem): ?ProductConcreteTransfer;
}

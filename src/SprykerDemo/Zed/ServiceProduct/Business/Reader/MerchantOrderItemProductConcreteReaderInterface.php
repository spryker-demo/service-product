<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Reader;

use Generated\Shared\Transfer\ProductConcreteTransfer;

interface MerchantOrderItemProductConcreteReaderInterface
{
    /**
     * @param int $idMerchantSalesOrderItem
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer|null
     */
    public function findProductByIdMerchantSalesOrderItem(int $idMerchantSalesOrderItem): ?ProductConcreteTransfer;
}

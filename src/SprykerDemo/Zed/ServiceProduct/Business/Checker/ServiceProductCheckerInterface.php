<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Checker;

interface ServiceProductCheckerInterface
{
    /**
     * @param int $idMerchantSalesOrderItem
     *
     * @return bool
     */
    public function checkMerchantOrderItemIsServiceProduct(int $idMerchantSalesOrderItem): bool;

    /**
     * @param int $idSalesOrderItem
     *
     * @return bool
     */
    public function checkSalesOrderItemIsServiceProduct(int $idSalesOrderItem): bool;
}

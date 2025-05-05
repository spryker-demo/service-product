<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Detector;

interface MerchantOrderItemServiceProductDetectorInterface
{
    /**
     * @param int $idMerchantSalesOrderItem
     *
     * @return bool
     */
    public function isServiceProduct(int $idMerchantSalesOrderItem): bool;
}

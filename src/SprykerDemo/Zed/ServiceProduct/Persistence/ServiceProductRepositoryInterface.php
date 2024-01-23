<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Persistence;

interface ServiceProductRepositoryInterface
{
    /**
     * @param int $idSalesOrderItem
     *
     * @return string|null
     */
    public function findProductSkuBySalesOrderItemId(int $idSalesOrderItem): ?string;
}

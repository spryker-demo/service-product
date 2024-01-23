<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \SprykerDemo\Zed\ServiceProduct\Persistence\ServiceProductPersistenceFactory getFactory()
 */
class ServiceProductRepository extends AbstractRepository implements ServiceProductRepositoryInterface
{
    /**
     * @param int $idSalesOrderItem
     *
     * @return string|null
     */
    public function findProductSkuBySalesOrderItemId(int $idSalesOrderItem): ?string
    {
        $salesOrderItemEntity = $this->getFactory()->getSalesOrderItemQuery()
            ->findOneByIdSalesOrderItem($idSalesOrderItem);
        if (!$salesOrderItemEntity) {
            return null;
        }

        return $salesOrderItemEntity->getSku();
    }
}

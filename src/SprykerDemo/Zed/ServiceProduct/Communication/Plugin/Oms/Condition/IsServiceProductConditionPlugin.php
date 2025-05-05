<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Communication\Plugin\Oms\Condition;

use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Oms\Dependency\Plugin\Condition\ConditionInterface;

/**
 * @method \SprykerDemo\Zed\ServiceProduct\Business\ServiceProductFacadeInterface getFacade()
 * @method \SprykerDemo\Zed\ServiceProduct\Communication\ServiceProductCommunicationFactory getFactory()
 * @method \SprykerDemo\Zed\ServiceProduct\ServiceProductConfig getConfig()
 */
class IsServiceProductConditionPlugin extends AbstractPlugin implements ConditionInterface
{
    /**
     * {@inheritDoc}
     * - Gets product by sales order item sku.
     * - Returns value of service product flag.
     *
     * @api
     *
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem $orderItem
     *
     * @return bool
     */
    public function check(SpySalesOrderItem $orderItem): bool
    {
        $productConcreteTransfer = $this->getFactory()
            ->getProductFacade()
            ->getProductConcrete($orderItem->getSku());

        return $productConcreteTransfer->getIsServiceProduct();
    }
}

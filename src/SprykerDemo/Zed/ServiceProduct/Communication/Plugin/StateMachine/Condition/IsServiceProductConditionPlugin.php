<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Communication\Plugin\StateMachine\Condition;

use Generated\Shared\Transfer\StateMachineItemTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\StateMachine\Dependency\Plugin\ConditionPluginInterface;

/**
 * @method \SprykerDemo\Zed\ServiceProduct\Business\ServiceProductFacadeInterface getFacade()
 */
class IsServiceProductConditionPlugin extends AbstractPlugin implements ConditionPluginInterface
{
    /**
     * {@inheritDoc}
     * - Finds product concrete by merchant order item.
     * - Returns value of service product flag.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\StateMachineItemTransfer $stateMachineItemTransfer
     *
     * @return bool
     */
    public function check(StateMachineItemTransfer $stateMachineItemTransfer): bool
    {
        return $this->getFacade()->checkMerchantOrderItemIsServiceProduct($stateMachineItemTransfer->getIdentifier());
    }
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod;

use Generated\Shared\Transfer\ShipmentGroupTransfer;
use SprykerDemo\Zed\ServiceProduct\Business\Checker\ServiceProductCheckerInterface;

class ShipmentMethodChecker implements ShipmentMethodCheckerInterface
{
    /**
     * @var \SprykerDemo\Zed\ServiceProduct\Business\Checker\ServiceProductCheckerInterface
     */
    protected ServiceProductCheckerInterface $serviceProductChecker;

    /**
     * @param \SprykerDemo\Zed\ServiceProduct\Business\Checker\ServiceProductCheckerInterface $serviceProductChecker
     */
    public function __construct(ServiceProductCheckerInterface $serviceProductChecker)
    {
        $this->serviceProductChecker = $serviceProductChecker;
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     *
     * @return bool
     */
    public function containsOnlyServiceProductItems(ShipmentGroupTransfer $shipmentGroupTransfer): bool
    {
        foreach ($shipmentGroupTransfer->getItems() as $itemTransfer) {
            if (!$this->serviceProductChecker->checkIsServiceProductByAttributes($itemTransfer->getConcreteAttributes())) {
                return false;
            }
        }

        return true;
    }
}

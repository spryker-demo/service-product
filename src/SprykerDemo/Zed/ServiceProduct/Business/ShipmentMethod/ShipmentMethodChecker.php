<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod;

use Generated\Shared\Transfer\ShipmentGroupTransfer;
use SprykerDemo\Zed\ServiceProduct\ServiceProductConfig;

class ShipmentMethodChecker implements ShipmentMethodCheckerInterface
{
    /**
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     *
     * @return bool
     */
    public function containsOnlyServiceProductItems(ShipmentGroupTransfer $shipmentGroupTransfer): bool
    {
        foreach ($shipmentGroupTransfer->getItems() as $itemTransfer) {
            if (!isset($itemTransfer->getConcreteAttributes()[ServiceProductConfig::SERVICE_PRODUCT_ATTRIBUTE])) {
                return false;
            }
        }

        return true;
    }
}

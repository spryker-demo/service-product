<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\ShipmentGroup;

use ArrayObject;
use Generated\Shared\Transfer\ShipmentGroupTransfer;
use SprykerDemo\Zed\ServiceProduct\ServiceProductConfig;

class ShipmentGroupMethodFilter implements ShipmentGroupMethodFilterInterface
{
    /**
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     *
     * @return \ArrayObject<\Generated\Shared\Transfer\ShipmentMethodTransfer>
     */
    public function filterShipmentGroupMethods(ShipmentGroupTransfer $shipmentGroupTransfer): ArrayObject
    {
        $shipmentMethods = $shipmentGroupTransfer->getAvailableShipmentMethodsOrFail()->getMethods();
        $shipmentGroupHasOnlyServiceProductItems = $this->shipmentGroupHasOnlyServiceProductItems($shipmentGroupTransfer);

        foreach ($shipmentMethods as $shipmentMethodIndex => $shipmentMethodTransfer) {
            if ($shipmentMethodTransfer->getName() !== ServiceProductConfig::SERVICE_PRODUCT_SHIPMENT_METHOD_NAME) {
                continue;
            }

            if ($shipmentGroupHasOnlyServiceProductItems) {
                return new ArrayObject([$shipmentMethodTransfer]);
            }

            $shipmentMethods->offsetUnset($shipmentMethodIndex);
        }

        return $shipmentMethods;
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     *
     * @return bool
     */
    protected function shipmentGroupHasOnlyServiceProductItems(ShipmentGroupTransfer $shipmentGroupTransfer): bool
    {
        foreach ($shipmentGroupTransfer->getItems() as $itemTransfer) {
            if (!$itemTransfer->getIsServiceProduct()) {
                return false;
            }
        }

        return true;
    }
}

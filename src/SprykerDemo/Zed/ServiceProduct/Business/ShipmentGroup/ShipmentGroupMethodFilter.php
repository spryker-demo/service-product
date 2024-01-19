<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\ShipmentGroup;

use ArrayObject;
use Generated\Shared\Transfer\ShipmentGroupTransfer;
use SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod\ShipmentMethodCheckerInterface;
use SprykerDemo\Zed\ServiceProduct\ServiceProductConfig;

class ShipmentGroupMethodFilter implements ShipmentGroupMethodFilterInterface
{
    /**
     * @var \SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod\ShipmentMethodCheckerInterface
     */
    protected $shipmentMethodChecker;

    /**
     * @param \SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod\ShipmentMethodCheckerInterface $shipmentMethodChecker
     */
    public function __construct(ShipmentMethodCheckerInterface $shipmentMethodChecker)
    {
        $this->shipmentMethodChecker = $shipmentMethodChecker;
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     *
     * @return \ArrayObject<\Generated\Shared\Transfer\ShipmentMethodTransfer>
     */
    public function filterShipmentGroupMethods(ShipmentGroupTransfer $shipmentGroupTransfer): ArrayObject
    {
        $shipmentMethods = $shipmentGroupTransfer->getAvailableShipmentMethodsOrFail()->getMethods();
        $containsOnlyServiceProductItems = $this->shipmentMethodChecker->containsOnlyServiceProductItems($shipmentGroupTransfer);

        foreach ($shipmentMethods as $shipmentMethodIndex => $shipmentMethodTransfer) {
            if ($shipmentMethodTransfer->getName() === ServiceProductConfig::SERVICE_PRODUCT_SHIPMENT_METHOD_NAME) {
                if ($containsOnlyServiceProductItems) {
                    return new ArrayObject([$shipmentMethodTransfer]);
                }

                $shipmentMethods->offsetUnset($shipmentMethodIndex);

                return $shipmentMethods;
            }
        }

        return $shipmentMethods;
    }
}

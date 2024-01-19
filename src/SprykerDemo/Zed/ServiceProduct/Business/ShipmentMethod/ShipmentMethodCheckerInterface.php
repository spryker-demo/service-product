<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod;

use Generated\Shared\Transfer\ShipmentGroupTransfer;

interface ShipmentMethodCheckerInterface
{
    /**
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     *
     * @return bool
     */
    public function containsOnlyServiceProductItems(ShipmentGroupTransfer $shipmentGroupTransfer): bool;
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business;

use ArrayObject;
use Generated\Shared\Transfer\ShipmentGroupTransfer;

interface ServiceProductFacadeInterface
{
    /**
     * Specification:
     * - Filters non-available for service product shipment methods for each shipment group.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     *
     * @return \ArrayObject<\Generated\Shared\Transfer\ShipmentMethodTransfer>
     */
    public function filterShipmentGroupMethods(ShipmentGroupTransfer $shipmentGroupTransfer): ArrayObject;

    /**
     * Specification:
     * - Finds product by SKU.
     * - Checks if product is a service product.
     *
     * @api
     *
     * @param string $productConcreteSku
     *
     * @return bool
     */
    public function checkIsServiceProductBySku(string $productConcreteSku): bool;
}

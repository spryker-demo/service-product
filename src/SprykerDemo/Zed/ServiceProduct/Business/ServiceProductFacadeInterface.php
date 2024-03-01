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
     * - Requires `ShipmentGroupTransfer.availableShipmentMethods` to be set.
     * - Filters non-available shipment methods for service product items to be purchased.
     * - Filters service product shipment method if in group items not only service products.
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
     * - Finds `MerchantOrderItemTransfer` by `$idMerchantOrderItem`
     * - Finds product by merchant order item.
     * - Checks if product concrete is a service product by attributes.
     *
     * @api
     *
     * @param int $idMerchantSalesOrderItem
     *
     * @return bool
     */
    public function checkMerchantOrderItemIsServiceProduct(int $idMerchantSalesOrderItem): bool;
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business;

use ArrayObject;
use Generated\Shared\Transfer\CartChangeTransfer;
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
     * - Finds product concrete by merchant order item.
     * - Returns value of service product flag.
     *
     * @api
     *
     * @param int $idMerchantSalesOrderItem
     *
     * @return bool
     */
    public function checkMerchantOrderItemIsServiceProduct(int $idMerchantSalesOrderItem): bool;

    /**
     * Specification:
     * - Expands the product concretes by adding the service flag property.
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\ProductConcreteTransfer> $productConcreteTransfers
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteTransfer>
     */
    public function expandProductConcretesWithServiceProductFlag(array $productConcreteTransfers): array;

    /**
     * Specification:
     * - Expands the product concrete storage transfers by adding the service flag property.
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\ProductConcreteStorageTransfer> $productConcreteStorageTransfers
     *
     * @return array<\Generated\Shared\Transfer\ProductConcreteStorageTransfer>
     */
    public function expandProductConcreteStoragesWithServiceFlag(array $productConcreteStorageTransfers): array;

    /**
     * Specification:
     * - Expands items with service product flag.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CartChangeTransfer $cartChangeTransfer
     *
     * @return \Generated\Shared\Transfer\CartChangeTransfer
     */
    public function expandItemsWithServiceProductFlag(CartChangeTransfer $cartChangeTransfer): CartChangeTransfer;
}

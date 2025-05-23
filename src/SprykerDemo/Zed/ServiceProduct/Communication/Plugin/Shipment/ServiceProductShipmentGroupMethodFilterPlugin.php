<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Communication\Plugin\Shipment;

use ArrayObject;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\ShipmentGroupTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ShipmentExtension\Dependency\Plugin\ShipmentMethodFilterPluginInterface;

/**
 * @method \SprykerDemo\Zed\ServiceProduct\Business\ServiceProductFacadeInterface getFacade()
 * @method \SprykerDemo\Zed\ServiceProduct\Communication\ServiceProductCommunicationFactory getFactory()
 * @method \SprykerDemo\Zed\ServiceProduct\ServiceProductConfig getConfig()
 */
class ServiceProductShipmentGroupMethodFilterPlugin extends AbstractPlugin implements ShipmentMethodFilterPluginInterface
{
    /**
     * {@inheritDoc}
     * - Requires `ShipmentGroupTransfer.availableShipmentMethods` to be set.
     * - Filters non-available shipment methods for service product items to be purchased.
     * - Filters service product shipment method if in group items not only service products.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \ArrayObject<\Generated\Shared\Transfer\ShipmentMethodTransfer>
     */
    public function filterShipmentMethods(ShipmentGroupTransfer $shipmentGroupTransfer, QuoteTransfer $quoteTransfer): ArrayObject
    {
        return $this->getFacade()->filterShipmentGroupMethods($shipmentGroupTransfer);
    }
}

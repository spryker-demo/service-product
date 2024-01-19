<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business;

use ArrayObject;
use Generated\Shared\Transfer\ShipmentGroupTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerDemo\Zed\ServiceProduct\Business\ServiceProductBusinessFactory getFactory()
 */
class ServiceProductFacade extends AbstractFacade implements ServiceProductFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     *
     * @return \ArrayObject<\Generated\Shared\Transfer\ShipmentMethodTransfer>
     */
    public function filterShipmentGroupMethods(ShipmentGroupTransfer $shipmentGroupTransfer): ArrayObject
    {
        return $this->getFactory()->createShipmentGroupMethodFilter()->filterShipmentGroupMethods($shipmentGroupTransfer);
    }
}

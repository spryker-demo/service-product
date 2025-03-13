<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\ShipmentMethod;

use Generated\Shared\Transfer\RawProductAttributesTransfer;
use Generated\Shared\Transfer\ShipmentGroupTransfer;
use SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface;

class ShipmentMethodChecker implements ShipmentMethodCheckerInterface
{
    /**
     * @var \SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface
     */
    protected ServiceProductServiceInterface $serviceProductService;

    /**
     * @param \SprykerDemo\Service\ServiceProduct\ServiceProductServiceInterface $serviceProductService
     */
    public function __construct(ServiceProductServiceInterface $serviceProductService)
    {
        $this->serviceProductService = $serviceProductService;
    }

    /**
     * @param \Generated\Shared\Transfer\ShipmentGroupTransfer $shipmentGroupTransfer
     *
     * @return bool
     */
    public function containsOnlyServiceProductItems(ShipmentGroupTransfer $shipmentGroupTransfer): bool
    {
        $rawProductAttributesTransfer = new RawProductAttributesTransfer();

        foreach ($shipmentGroupTransfer->getItems() as $itemTransfer) {
            $rawProductAttributesTransfer->setConcreteAttributes($itemTransfer->getConcreteAttributes());

            if (!$this->serviceProductService->isServiceProduct($rawProductAttributesTransfer)) {
                return false;
            }
        }

        return true;
    }
}

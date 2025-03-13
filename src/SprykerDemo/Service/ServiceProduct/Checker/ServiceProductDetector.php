<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct\Checker;

use Generated\Shared\Transfer\RawProductAttributesTransfer;
use SprykerDemo\Service\ServiceProduct\ServiceProductConfig;

class ServiceProductDetector implements ServiceProductDetectorInterface
{
    /**
     * @var \SprykerDemo\Service\ServiceProduct\ServiceProductConfig
     */
    protected ServiceProductConfig $serviceProductConfig;

    /**
     * @param \SprykerDemo\Service\ServiceProduct\ServiceProductConfig $serviceProductConfig
     */
    public function __construct(ServiceProductConfig $serviceProductConfig)
    {
        $this->serviceProductConfig = $serviceProductConfig;
    }

    /**
     * @param \Generated\Shared\Transfer\RawProductAttributesTransfer $rawProductAttributesTransfer
     *
     * @return bool
     */
    public function isServiceProduct(RawProductAttributesTransfer $rawProductAttributesTransfer): bool
    {
        $productAttributes = $rawProductAttributesTransfer->getConcreteAttributes();
        $serviceProductAttribute = $this->serviceProductConfig->getServiceProductAttribute();

        if (!isset($productAttributes[$serviceProductAttribute])) {
            return false;
        }

        return in_array(
            $productAttributes[$serviceProductAttribute],
            $this->serviceProductConfig->getIsServiceProductAttributeLocalizedValues(),
        );
    }
}

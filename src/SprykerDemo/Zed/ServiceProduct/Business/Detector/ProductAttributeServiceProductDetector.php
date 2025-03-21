<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Detector;

use SprykerDemo\Zed\ServiceProduct\ServiceProductConfig;

class ProductAttributeServiceProductDetector implements ProductAttributeServiceProductDetectorInterface
{
    /**
     * @var \SprykerDemo\Zed\ServiceProduct\ServiceProductConfig
     */
    protected ServiceProductConfig $serviceProductConfig;

    /**
     * @param \SprykerDemo\Zed\ServiceProduct\ServiceProductConfig $serviceProductConfig
     */
    public function __construct(ServiceProductConfig $serviceProductConfig)
    {
        $this->serviceProductConfig = $serviceProductConfig;
    }

    /**
     * @param array<string> $productAttributes
     *
     * @return bool
     */
    public function isServiceProduct(array $productAttributes): bool
    {
        $serviceProductAttributeKey = $this->serviceProductConfig->getServiceProductAttributeKey();

        return isset($productAttributes[$serviceProductAttributeKey])
            && filter_var($productAttributes[$serviceProductAttributeKey], FILTER_VALIDATE_BOOLEAN);
    }
}

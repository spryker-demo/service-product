<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct\Checker;

use SprykerDemo\Service\ServiceProduct\ServiceProductConfig;

class ServiceProductChecker implements ServiceProductCheckerInterface
{
    /**
     * @param array<string, string> $productAttributes
     *
     * @return bool
     */
    public function isServiceProduct(array $productAttributes): bool
    {
        if (!isset($productAttributes[ServiceProductConfig::SERVICE_PRODUCT_ATTRIBUTE])) {
            return false;
        }

        return $productAttributes[ServiceProductConfig::SERVICE_PRODUCT_ATTRIBUTE] === ServiceProductConfig::SERVICE_PRODUCT_ATTRIBUTE_VALUE_YES;
    }
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct;

interface ServiceProductServiceInterface
{
    /**
     * Specification:
     * - Checks if product is a service product.
     *
     * @api
     *
     * @param array<string, string> $productAttributes
     *
     * @return bool
     */
    public function isServiceProduct(array $productAttributes): bool;
}

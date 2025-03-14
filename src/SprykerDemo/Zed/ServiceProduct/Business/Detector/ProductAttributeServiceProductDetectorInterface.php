<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Detector;

interface ProductAttributeServiceProductDetectorInterface
{
    /**
     * @param array<string> $productAttributes
     *
     * @return bool
     */
    public function isServiceProduct(array $productAttributes): bool;
}

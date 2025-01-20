<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct\Checker;

interface ServiceProductCheckerInterface
{
    /**
     * @param array<string, string> $productAttributes
     *
     * @return bool
     */
    public function isServiceProduct(array $productAttributes): bool;
}

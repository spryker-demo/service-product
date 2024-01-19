<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Checker;

interface ServiceProductCheckerInterface
{
    /**
     * @param string $productConcreteSku
     *
     * @return bool
     */
    public function checkIsServiceProductBySku(string $productConcreteSku): bool;

    /**
     * @param array<string> $productAttributes
     *
     * @return bool
     */
    public function checkIsServiceProductByAttributes(array $productAttributes): bool;
}

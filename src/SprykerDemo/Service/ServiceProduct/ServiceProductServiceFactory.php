<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct;

use Spryker\Service\Kernel\AbstractServiceFactory;
use SprykerDemo\Service\ServiceProduct\Checker\ServiceProductChecker;
use SprykerDemo\Service\ServiceProduct\Checker\ServiceProductCheckerInterface;

class ServiceProductServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \SprykerDemo\Service\ServiceProduct\Checker\ServiceProductCheckerInterface
     */
    public function createServiceProductChecker(): ServiceProductCheckerInterface
    {
        return new ServiceProductChecker();
    }
}

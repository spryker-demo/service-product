<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct;

use Spryker\Service\Kernel\AbstractServiceFactory;
use SprykerDemo\Service\ServiceProduct\Checker\ServiceProductDetector;
use SprykerDemo\Service\ServiceProduct\Checker\ServiceProductDetectorInterface;

/**
 * @method \SprykerDemo\Service\ServiceProduct\ServiceProductConfig getConfig()
 */
class ServiceProductServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \SprykerDemo\Service\ServiceProduct\Checker\ServiceProductDetectorInterface
     */
    public function createServiceProductDetector(): ServiceProductDetectorInterface
    {
        return new ServiceProductDetector($this->getConfig());
    }
}

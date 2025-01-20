<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct;

use Spryker\Service\Kernel\AbstractService;

/**
 * @method \SprykerDemo\Service\ServiceProduct\ServiceProductServiceFactory getFactory()
 */
class ServiceProductService extends AbstractService implements ServiceProductServiceInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<string, string> $productAttributes
     *
     * @return bool
     */
    public function isServiceProduct(array $productAttributes): bool
    {
        return $this->getFactory()
            ->createServiceProductChecker()
            ->isServiceProduct($productAttributes);
    }
}

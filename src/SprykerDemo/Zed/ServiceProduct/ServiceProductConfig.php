<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class ServiceProductConfig extends AbstractBundleConfig
{
    /**
     * @var string
     */
    public const SERVICE_PRODUCT_SHIPMENT_METHOD_NAME = 'ServiceShipment';

    /**
     * @var string
     */
    protected const ATTRIBUTE_KEY_SERVICE_PRODUCT = 'service_product';

    /**
     * @api
     *
     * @return string
     */
    public function getServiceProductAttributeKey(): string
    {
        return static::ATTRIBUTE_KEY_SERVICE_PRODUCT;
    }
}

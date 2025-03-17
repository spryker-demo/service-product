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
    protected const SERVICE_SHIPMENT_METHOD_KEY = 'spryker_service_shipment';

    /**
     * @var string
     */
    protected const ATTRIBUTE_KEY_SERVICE_PRODUCT = 'service_product';

    /**
     * @api
     *
     * @return string
     */
    public function getServiceShipmentMethodKey(): string
    {
        return static::SERVICE_SHIPMENT_METHOD_KEY;
    }

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

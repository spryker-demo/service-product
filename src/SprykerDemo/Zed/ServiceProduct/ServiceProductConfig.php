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
     * @uses \Spryker\Shared\Shipment\ShipmentConfig::SHIPMENT_METHOD_NAME_NO_SHIPMENT
     *
     * @var string
     */
    public const SERVICE_PRODUCT_SHIPMENT_METHOD_NAME = 'NoShipment';

    /**
     * @var string
     */
    public const SERVICE_PRODUCT_ATTRIBUTE = 'service_product';

    /**
     * @var string
     */
    public const IS_SERVICE_PRODUCT_ATTRIBUTE_VALUE = 'Yes';
}

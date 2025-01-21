<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct;

use Spryker\Service\Kernel\AbstractBundleConfig;

class ServiceProductConfig extends AbstractBundleConfig
{
    /**
     * @var array<string, string>
     */
    protected const IS_SERVICE_PRODUCT_ATTRIBUTE_LOCALIZED_VALUES = [
        'en_US' => 'Yes',
        'de_DE' => 'Ja',
        'fr_FR' => 'Oui',
        'es_ES' => 'Sí',
    ];

    /**
     * @var string
     */
    protected const SERVICE_PRODUCT_ATTRIBUTE = 'service_product';

    /**
     * @api
     *
     * @return string
     */
    public function getServiceProductAttribute(): string
    {
        return static::SERVICE_PRODUCT_ATTRIBUTE;
    }

    /**
     * @api
     *
     * @return array<string, string>
     */
    public function getIsServiceProductAttributeLocalizedValues(): array
    {
        return static::IS_SERVICE_PRODUCT_ATTRIBUTE_LOCALIZED_VALUES;
    }
}

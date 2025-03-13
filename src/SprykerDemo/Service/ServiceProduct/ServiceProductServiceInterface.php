<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct;

use Generated\Shared\Transfer\RawProductAttributesTransfer;

interface ServiceProductServiceInterface
{
    /**
     * Specification:
     * - Checks if product is a service product based on its attributes.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RawProductAttributesTransfer $rawProductAttributesTransfer
     *
     * @return bool
     */
    public function isServiceProduct(RawProductAttributesTransfer $rawProductAttributesTransfer): bool;
}

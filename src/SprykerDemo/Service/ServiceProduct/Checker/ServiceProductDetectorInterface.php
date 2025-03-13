<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Service\ServiceProduct\Checker;

use Generated\Shared\Transfer\RawProductAttributesTransfer;

interface ServiceProductDetectorInterface
{
    /**
     * @param \Generated\Shared\Transfer\RawProductAttributesTransfer $rawProductAttributesTransfer
     *
     * @return bool
     */
    public function isServiceProduct(RawProductAttributesTransfer $rawProductAttributesTransfer): bool;
}

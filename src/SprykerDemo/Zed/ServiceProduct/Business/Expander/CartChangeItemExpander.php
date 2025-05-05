<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Expander;

use Generated\Shared\Transfer\CartChangeTransfer;
use Generated\Shared\Transfer\ProductConcreteCollectionTransfer;
use Generated\Shared\Transfer\ProductConcreteConditionsTransfer;
use Generated\Shared\Transfer\ProductConcreteCriteriaTransfer;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

class CartChangeItemExpander implements CartChangeItemExpanderInterface
{
    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected ProductFacadeInterface $productFacade;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct(ProductFacadeInterface $productFacade)
    {
        $this->productFacade = $productFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\CartChangeTransfer $cartChangeTransfer
     *
     * @return \Generated\Shared\Transfer\CartChangeTransfer
     */
    public function expandWithServiceProductFlag(CartChangeTransfer $cartChangeTransfer): CartChangeTransfer
    {
        $itemSkus = $this->getItemSkus($cartChangeTransfer);
        $productCollectionTransfer = $this->getProductCollectionBySkus($itemSkus);

        foreach ($productCollectionTransfer->getProducts() as $productConcreteTransfer) {
            foreach ($cartChangeTransfer->getItems() as $itemTransfer) {
                if ($itemTransfer->getSku() !== $productConcreteTransfer->getSku()) {
                    continue;
                }

                $itemTransfer->setIsServiceProduct($productConcreteTransfer->getIsServiceProduct());
            }
        }

        return $cartChangeTransfer;
    }

    /**
     * @param array<int, string> $skus
     *
     * @return \Generated\Shared\Transfer\ProductConcreteCollectionTransfer
     */
    protected function getProductCollectionBySkus(array $skus): ProductConcreteCollectionTransfer
    {
        $productConcreteConditionsTransfer = (new ProductConcreteConditionsTransfer())->setSkus($skus);
        $productConcreteCriteriaTransfer = (new ProductConcreteCriteriaTransfer())->setProductConcreteConditions($productConcreteConditionsTransfer);

        return $this->productFacade->getProductConcreteCollection($productConcreteCriteriaTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CartChangeTransfer $cartChangeTransfer
     *
     * @return array<int, string>
     */
    protected function getItemSkus(CartChangeTransfer $cartChangeTransfer): array
    {
        $itemSkus = [];
        foreach ($cartChangeTransfer->getItems() as $itemTransfer) {
            if (!$itemTransfer->getSku()) {
                continue;
            }

            $itemSkus[] = $itemTransfer->getSku();
        }

        return $itemSkus;
    }
}

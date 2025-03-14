<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Reader;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\MerchantOrderItemCriteriaTransfer;
use Generated\Shared\Transfer\MerchantOrderItemTransfer;
use Generated\Shared\Transfer\OrderItemFilterTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Spryker\Zed\MerchantSalesOrder\Business\MerchantSalesOrderFacadeInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use Spryker\Zed\Sales\Business\SalesFacadeInterface;

class MerchantOrderItemProductConcreteReader implements MerchantOrderItemProductConcreteReaderInterface
{
    /**
     * @var int
     */
    protected const FIRST_ITEM_INDEX = 0;

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected ProductFacadeInterface $productFacade;

    /**
     * @var \Spryker\Zed\MerchantSalesOrder\Business\MerchantSalesOrderFacadeInterface
     */
    protected MerchantSalesOrderFacadeInterface $merchantSalesOrderFacade;

    /**
     * @var \Spryker\Zed\Sales\Business\SalesFacadeInterface
     */
    protected SalesFacadeInterface $salesFacade;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     * @param \Spryker\Zed\MerchantSalesOrder\Business\MerchantSalesOrderFacadeInterface $merchantSalesOrderFacade
     * @param \Spryker\Zed\Sales\Business\SalesFacadeInterface $salesFacade
     */
    public function __construct(
        ProductFacadeInterface $productFacade,
        MerchantSalesOrderFacadeInterface $merchantSalesOrderFacade,
        SalesFacadeInterface $salesFacade
    ) {
        $this->productFacade = $productFacade;
        $this->merchantSalesOrderFacade = $merchantSalesOrderFacade;
        $this->salesFacade = $salesFacade;
    }

    /**
     * @param int $idMerchantSalesOrderItem
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer|null
     */
    public function findProductByIdMerchantSalesOrderItem(int $idMerchantSalesOrderItem): ?ProductConcreteTransfer
    {
        $merchantOrderItemTransfer = $this->findMerchantOrderItem($idMerchantSalesOrderItem);
        if (!$merchantOrderItemTransfer) {
            return null;
        }

        $itemTransfer = $this->findOrderItemByIdSalesOrderItem($merchantOrderItemTransfer->getIdOrderItem());
        if (!$itemTransfer) {
            return null;
        }

        return $this->productFacade->getProductConcrete($itemTransfer->getSku());
    }

    /**
     * @param int $idSalesOrderItem
     *
     * @return \Generated\Shared\Transfer\ItemTransfer|null
     */
    protected function findOrderItemByIdSalesOrderItem(int $idSalesOrderItem): ?ItemTransfer
    {
        $orderItemFilterTransfer = (new OrderItemFilterTransfer())->addSalesOrderItemId($idSalesOrderItem);
        $itemCollectionTransfer = $this->salesFacade->getOrderItems($orderItemFilterTransfer);

        return $itemCollectionTransfer->getItems()->offsetGet(static::FIRST_ITEM_INDEX);
    }

    /**
     * @param int $idMerchantOrderItem
     *
     * @return \Generated\Shared\Transfer\MerchantOrderItemTransfer|null
     */
    protected function findMerchantOrderItem(int $idMerchantOrderItem): ?MerchantOrderItemTransfer
    {
        $merchantOrderItemCriteriaTransfer = (new MerchantOrderItemCriteriaTransfer())
            ->setIdMerchantOrderItem($idMerchantOrderItem);

        return $this->merchantSalesOrderFacade->findMerchantOrderItem($merchantOrderItemCriteriaTransfer);
    }
}

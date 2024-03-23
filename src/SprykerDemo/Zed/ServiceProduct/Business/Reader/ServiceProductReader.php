<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business\Reader;

use Generated\Shared\Transfer\MerchantOrderItemCriteriaTransfer;
use Generated\Shared\Transfer\MerchantOrderItemTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Spryker\Zed\MerchantSalesOrder\Business\MerchantSalesOrderFacadeInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use SprykerDemo\Zed\ServiceProduct\Persistence\ServiceProductRepositoryInterface;

class ServiceProductReader implements ServiceProductReaderInterface
{
    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected ProductFacadeInterface $productFacade;

    /**
     * @var \Spryker\Zed\MerchantSalesOrder\Business\MerchantSalesOrderFacadeInterface
     */
    protected MerchantSalesOrderFacadeInterface $merchantSalesOrderFacade;

    /**
     * @var \SprykerDemo\Zed\ServiceProduct\Persistence\ServiceProductRepositoryInterface
     */
    protected ServiceProductRepositoryInterface $repository;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     * @param \Spryker\Zed\MerchantSalesOrder\Business\MerchantSalesOrderFacadeInterface $merchantSalesOrderFacade
     * @param \SprykerDemo\Zed\ServiceProduct\Persistence\ServiceProductRepositoryInterface $repository
     */
    public function __construct(
        ProductFacadeInterface $productFacade,
        MerchantSalesOrderFacadeInterface $merchantSalesOrderFacade,
        ServiceProductRepositoryInterface $repository
    ) {
        $this->productFacade = $productFacade;
        $this->merchantSalesOrderFacade = $merchantSalesOrderFacade;
        $this->repository = $repository;
    }

    /**
     * @param int $idMerchantSalesOrderItem
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer|null
     */
    public function findProductConcreteByMerchantOrderItemId(int $idMerchantSalesOrderItem): ?ProductConcreteTransfer
    {
        $merchantOrderItemTransfer = $this->findMerchantOrderItem($idMerchantSalesOrderItem);
        if (!$merchantOrderItemTransfer) {
            return null;
        }

        return $this->findProductConcreteByIdSalesOrderItem($merchantOrderItemTransfer->getIdOrderItem());
    }

    /**
     * @param int $idSalesOrderItem
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer|null
     */
    public function findProductConcreteByIdSalesOrderItem(int $idSalesOrderItem): ?ProductConcreteTransfer
    {
        $productConcreteSku = $this->repository->findProductSkuBySalesOrderItemId($idSalesOrderItem);
        if (!$productConcreteSku) {
            return null;
        }

        $productConcreteId = $this->productFacade->findProductConcreteIdBySku($productConcreteSku);
        if (!$productConcreteId) {
            return null;
        }

        return $this->productFacade->findProductConcreteById($productConcreteId);
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

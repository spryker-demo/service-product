<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\ServiceProduct\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\MerchantSalesOrder\Business\MerchantSalesOrderFacadeInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use Spryker\Zed\Sales\Business\SalesFacadeInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Detector\MerchantOrderItemServiceProductDetector;
use SprykerDemo\Zed\ServiceProduct\Business\Detector\MerchantOrderItemServiceProductDetectorInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetector;
use SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetectorInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Expander\CartChangeItemExpander;
use SprykerDemo\Zed\ServiceProduct\Business\Expander\CartChangeItemExpanderInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Expander\ProductConcreteExpander;
use SprykerDemo\Zed\ServiceProduct\Business\Expander\ProductConcreteExpanderInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Expander\ProductConcreteStorageExpander;
use SprykerDemo\Zed\ServiceProduct\Business\Expander\ProductConcreteStorageExpanderInterface;
use SprykerDemo\Zed\ServiceProduct\Business\Reader\MerchantOrderItemProductConcreteReader;
use SprykerDemo\Zed\ServiceProduct\Business\Reader\MerchantOrderItemProductConcreteReaderInterface;
use SprykerDemo\Zed\ServiceProduct\Business\ShipmentGroup\ShipmentGroupMethodFilter;
use SprykerDemo\Zed\ServiceProduct\Business\ShipmentGroup\ShipmentGroupMethodFilterInterface;
use SprykerDemo\Zed\ServiceProduct\ServiceProductDependencyProvider;

/**
 * @method \SprykerDemo\Zed\ServiceProduct\ServiceProductConfig getConfig()
 */
class ServiceProductBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\ShipmentGroup\ShipmentGroupMethodFilterInterface
     */
    public function createShipmentGroupMethodFilter(): ShipmentGroupMethodFilterInterface
    {
        return new ShipmentGroupMethodFilter(
            $this->getConfig(),
        );
    }

    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\Detector\MerchantOrderItemServiceProductDetectorInterface
     */
    public function createMerchantOrderItemServiceProductDetector(): MerchantOrderItemServiceProductDetectorInterface
    {
        return new MerchantOrderItemServiceProductDetector(
            $this->createMerchantOrderItemProductConcreteReader(),
        );
    }

    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\Reader\MerchantOrderItemProductConcreteReaderInterface
     */
    public function createMerchantOrderItemProductConcreteReader(): MerchantOrderItemProductConcreteReaderInterface
    {
        return new MerchantOrderItemProductConcreteReader(
            $this->getProductFacade(),
            $this->getMerchantSalesOrderFacade(),
            $this->getSalesFacade(),
        );
    }

    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\Expander\ProductConcreteExpanderInterface
     */
    public function createProductConcreteExpander(): ProductConcreteExpanderInterface
    {
        return new ProductConcreteExpander(
            $this->createProductAttributeServiceProductDetector(),
        );
    }

    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\Expander\ProductConcreteStorageExpanderInterface
     */
    public function createProductConcreteStorageExpander(): ProductConcreteStorageExpanderInterface
    {
        return new ProductConcreteStorageExpander(
            $this->getProductFacade(),
            $this->createProductAttributeServiceProductDetector(),
        );
    }

    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\Expander\CartChangeItemExpanderInterface
     */
    public function createCartChangeItemExpander(): CartChangeItemExpanderInterface
    {
        return new CartChangeItemExpander($this->getProductFacade());
    }

    /**
     * @return \SprykerDemo\Zed\ServiceProduct\Business\Detector\ProductAttributeServiceProductDetectorInterface
     */
    public function createProductAttributeServiceProductDetector(): ProductAttributeServiceProductDetectorInterface
    {
        return new ProductAttributeServiceProductDetector(
            $this->getConfig(),
        );
    }

    /**
     * @return \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    public function getProductFacade(): ProductFacadeInterface
    {
        return $this->getProvidedDependency(ServiceProductDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\Sales\Business\SalesFacadeInterface
     */
    public function getSalesFacade(): SalesFacadeInterface
    {
        return $this->getProvidedDependency(ServiceProductDependencyProvider::FACADE_SALES);
    }

    /**
     * @return \Spryker\Zed\MerchantSalesOrder\Business\MerchantSalesOrderFacadeInterface
     */
    public function getMerchantSalesOrderFacade(): MerchantSalesOrderFacadeInterface
    {
        return $this->getProvidedDependency(ServiceProductDependencyProvider::FACADE_MERCHANT_SALES_ORDER);
    }
}

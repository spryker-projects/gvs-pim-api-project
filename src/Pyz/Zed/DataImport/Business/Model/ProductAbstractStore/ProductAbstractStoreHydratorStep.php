<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductAbstractStore;

use Generated\Shared\Transfer\PyzProductAbstractStoreTransfer;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class ProductAbstractStoreHydratorStep implements DataImportStepInterface
{
    /**
     * @var int
     */
    public const BULK_SIZE = 1000;

    /**
     * @var string
     */
    public const COLUMN_ABSTRACT_SKU = 'abstract_sku';
    /**
     * @var string
     */
    public const COLUMN_STORE_NAME = 'store_name';

    /**
     * @var string
     */
    public const DATA_PRODUCT_ABSTRACT_STORE_ENTITY_TRANSFER = 'DATA_PRODUCT_ABSTRACT_STORE_ENTITY_TRANSFER';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet): void
    {
        $this->importProductAbstractStore($dataSet);
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    protected function importProductAbstractStore(DataSetInterface $dataSet): void
    {
        $pyzProductAbstractStoreTransfer = new PyzProductAbstractStoreTransfer();
        $pyzProductAbstractStoreTransfer
            ->setStoreName($dataSet[static::COLUMN_STORE_NAME])
            ->setProductAbstractSku($dataSet[static::COLUMN_ABSTRACT_SKU]);

        $dataSet[static::DATA_PRODUCT_ABSTRACT_STORE_ENTITY_TRANSFER] = $pyzProductAbstractStoreTransfer;
    }
}

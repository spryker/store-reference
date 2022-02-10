<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\StoreReference\Business;

use Spryker\Zed\StoreReference\Business\Exception\StoreReferenceNotFoundException;
use Codeception\Test\Unit;
use Generated\Shared\Transfer\StoreTransfer;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Service
 * @group StoreReference
 * @group Model
 * @group StoreReferenceReaderTest
 * Add your own group annotations below this line
 */
class StoreReferenceReaderTest extends Unit
{
    /**
     * @var string
     */
    const STORE_REFERENCE = 'development_test-DE';

    /**
     * @var string
     */
    const STORE_MAME = 'DE';

    /**
     * @var \SprykerTest\Zed\StoreReference\StoreReferenceTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function testGetStoreByStoreReferenceReturnsExpectedTransferWhenInputArgumentIsCorrect(): void
    {
        // Arrange
        $expectedStoreTrasfer = (new StoreTransfer())
            ->setName(static::STORE_MAME)
            ->setStoreReference(static::STORE_REFERENCE);

        // Act
        $storeTransfer = $this->tester->getFacade()->getStoreByStoreReference(static::STORE_REFERENCE);

        // Assert
        $this->assertEquals($expectedStoreTrasfer, $storeTransfer);
    }

    /**
     * @return void
     */
    public function testGetStoreByStoreReferenceThrowsExceptionWhenInputArgumentIsNotCorrect(): void
    {
        // Arrange
        $invalidStoreReference = '1';

        // Assert
        $this->expectException(StoreReferenceNotFoundException::class);

        // Act
        $this->tester->getFacade()->getStoreByStoreReference($invalidStoreReference);
    }

    /**
     * @return void
     */
    public function testGetStoreByStoreNameReturnsExpectedTransferWhenInputArgumentIsCorrect(): void
    {
        // Arrange
        $expectedStoreTrasfer = (new StoreTransfer())
            ->setName(static::STORE_MAME)
            ->setStoreReference(static::STORE_REFERENCE);

        // Act
        $storeTransfer = $this->tester->getFacade()->getStoreByStoreName(static::STORE_MAME);

        // Assert
        $this->assertEquals($expectedStoreTrasfer, $storeTransfer);
    }

    /**
     * @return void
     */
    public function testGetStoreByStoreNameThrowsExceptionWhenInputArgumentIsNotCorrect(): void
    {
        // Arrange
        $invalidStoreName = '1';

        // Assert
        $this->expectException(StoreReferenceNotFoundException::class);

        // Act
        $this->tester->getFacade()->getStoreByStoreName($invalidStoreName);
    }
}

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\StoreReference\Business;

use Codeception\Test\Unit;
use Spryker\Zed\StoreReference\Business\Exception\StoreReferenceNotFoundException;
use SprykerTest\Zed\StoreReference\StoreReferenceTester;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group StoreReference
 * @group Business
 * @group StoreReferenceReaderTest
 * Add your own group annotations below this line
 */
class StoreReferenceReaderTest extends Unit
{
    /**
     * @var \SprykerTest\Zed\StoreReference\StoreReferenceTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->tester->mockConfig();
    }

    /**
     * @return void
     */
    public function testGetStoreByStoreReferenceReturnsExpectedTransferWhenInputArgumentIsCorrect(): void
    {
        // Act
        $storeTransfer = $this->tester->getFacade()->getStoreByStoreReference(StoreReferenceTester::STORE_REFERENCE);

        // Assert
        $this->assertEquals(StoreReferenceTester::STORE_REFERENCE, $storeTransfer->getStoreReference());
        $this->assertEquals(StoreReferenceTester::STORE_NAME, $storeTransfer->getName());
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
        // Act
        $storeTransfer = $this->tester->getFacade()->getStoreByStoreName(StoreReferenceTester::STORE_NAME);

        // Assert
        $this->assertEquals(StoreReferenceTester::STORE_REFERENCE, $storeTransfer->getStoreReference());
        $this->assertEquals(StoreReferenceTester::STORE_NAME, $storeTransfer->getName());
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

<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\StoreReference\Communication\Plugin;

use Generated\Shared\Transfer\AccessTokenRequestTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\OauthClientExtension\Dependency\Plugin\AccessTokenRequestExpanderPluginInterface;
use Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface;

/**
 * @method \Spryker\Zed\StoreReference\Business\StoreReferenceFacadeInterface getFacade()
 */
class StoreReferenceAccessTokenRequestExpanderPlugin extends AbstractPlugin implements AccessTokenRequestExpanderPluginInterface
{
    /**
     * @var \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface
     */
    protected $storeFacade;

    /**
     * @param \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface $storeFacade
     */
    public function __construct(StoreReferenceToStoreInterface $storeFacade)
    {
        $this->storeFacade = $storeFacade;
    }

    public function expand(AccessTokenRequestTransfer $accessTokenRequestTransfer): AccessTokenRequestTransfer
    {
        $storeName = $this->storeFacade->getCurrentStore();

        $storeTransfer = $this->getFacade()->getStoreByStoreName($storeName);

        // TODO: set data to $accessTokenRequestTransfer

        return $accessTokenRequestTransfer;
    }
}

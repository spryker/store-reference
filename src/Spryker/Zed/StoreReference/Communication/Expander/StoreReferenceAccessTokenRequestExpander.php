<?php

namespace Spryker\Zed\StoreReference\Communication\Expander;

use Generated\Shared\Transfer\AccessTokenRequestTransfer;
use Spryker\Zed\StoreReference\Business\StoreReferenceFacadeInterface;
use Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface;

class StoreReferenceAccessTokenRequestExpander implements StoreReferenceAccessTokenRequestExpanderInterface
{
    /**
     * @var \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface
     */
    protected $storeFacade;

    /**
     * @var \Spryker\Zed\StoreReference\Business\StoreReferenceFacadeInterface
     */
    protected $storeReferenceFacade;

    /**
     * @param \Spryker\Zed\StoreReference\Dependency\Facade\StoreReferenceToStoreInterface $storeFacade
     * @param \Spryker\Zed\StoreReference\Business\StoreReferenceFacadeInterface $storeReferenceFacade
     */
    public function __construct(StoreReferenceToStoreInterface $storeFacade, StoreReferenceFacadeInterface $storeReferenceFacade)
    {
        $this->storeFacade = $storeFacade;
        $this->storeReferenceFacade = $storeReferenceFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\AccessTokenRequestTransfer $accessTokenRequestTransfer
     * @return \Generated\Shared\Transfer\AccessTokenRequestTransfer
     *
     * @throws \Spryker\Zed\StoreReference\Business\Exception\StoreReferenceNotFoundException
     */
    public function expand(AccessTokenRequestTransfer $accessTokenRequestTransfer): AccessTokenRequestTransfer
    {
        $currentStoreTransfer = $this->storeFacade->getCurrentStore();
        $storeTransfer = $this->storeReferenceFacade->getStoreByStoreName($currentStoreTransfer->getName());

        $accessTokenRequestOptionsTransfer = $accessTokenRequestTransfer->getAccessTokenRequestOptions();

        if ($accessTokenRequestOptionsTransfer !== null) {
            $accessTokenRequestOptionsTransfer->setStoreReference($storeTransfer->getStoreReference());
        }

        return $accessTokenRequestTransfer;
    }
}

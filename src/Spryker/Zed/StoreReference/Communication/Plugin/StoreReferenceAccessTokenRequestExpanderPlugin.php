<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\StoreReference\Communication\Plugin;

use Generated\Shared\Transfer\AccessTokenRequestTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\OauthClientExtension\Dependency\Plugin\AccessTokenRequestExpanderPluginInterface;

/**
 * @method \Spryker\Zed\StoreReference\Communication\StoreReferenceCommunicationFactory getFactory()
 */
class StoreReferenceAccessTokenRequestExpanderPlugin extends AbstractPlugin implements AccessTokenRequestExpanderPluginInterface
{
    /**
     * {@inheritDoc}
     * - Expands access token request with store reference.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\AccessTokenRequestTransfer $accessTokenRequestTransfer
     *
     * @return \Generated\Shared\Transfer\AccessTokenRequestTransfer
     *
     * @throws \Spryker\Zed\StoreReference\Business\Exception\StoreReferenceNotFoundException
     */
    public function expand(AccessTokenRequestTransfer $accessTokenRequestTransfer): AccessTokenRequestTransfer
    {
        return $this->getFactory()
            ->createStoreReferenceAccessTokenRequestExpander()
            ->expand($accessTokenRequestTransfer);
    }
}

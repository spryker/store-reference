<?php
namespace SprykerTest\Zed\StoreReference;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class StoreReferenceCommunicationTester extends \Codeception\Actor
{
    use _generated\StoreReferenceCommunicationTesterActions;

    /**
     * @param array $storeNameReferenceMap
     *
     * @return void
     */
    public function mockStoreNameReferenceMap(array $storeNameReferenceMap): void
    {
        $this->mockConfigMethod('getStoreNameReferenceMap', $storeNameReferenceMap);
    }
}

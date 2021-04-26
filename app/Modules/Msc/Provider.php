<?php


namespace App\Modules\Msc;

use App\Modules\Common\AbstractProvider;

class Provider extends AbstractProvider
{
    private $publicApiBaseUrl = 'http://wcf.mscgva.ch/publicasmx/Tracking.asmx/GetRSSTrackingByContainerNumber';
    private $containerParam = '?ContainerNumber=';
    private $reponseType = 'text/xml';

    public function createProvider()
    {
        // TODO: Implement createProvider() method.
    }


}

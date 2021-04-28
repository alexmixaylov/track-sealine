<?php

namespace App\Http\Controllers;

use App\Modules\Common\ProviderHandlerFactory;
use App\Modules\Common\ResponseHandlerFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * @throws \Exception
     */
    public function track(Request $request): JsonResponse
    {
        // получилась высокая связанность кода, думаю что нужно делать декомпозицию
        // get data from client [providerName, containerNumber]
        $providerName  = $request->input('provider');
        $containerNumber = $request->input('container');
        $responseType = $request->input('response-type');

        // make handler for this  specific providerName
        $providerHandler = ProviderHandlerFactory::createHandler($providerName);

        // make request and get raw response from the providerName
        $response = $providerHandler->trackContainer($containerNumber);

        // resolve response with specific(content type) resolver
        $responseResolver = ResponseHandlerFactory::createResolver($responseType);

        $result = $responseResolver->resolveResult($response);
        // Здесь никак не могу разобраться почему я не могу дернуть метод getData()
        // вроде бы он публичный, странно как то
        return response()->json($result->getData());
    }
}

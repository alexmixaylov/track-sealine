<?php

namespace App\Http\Controllers;

use App\Modules\Common\Dto\ProviderDto;
use App\Modules\Common\HandlerFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function response;

class TrackController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function track(Request $request): JsonResponse
    {
        // почему сначала $request->get потом $request->post ? вообще правильно $request->input
        // да, это провал :)))
        $providerData = new ProviderDto($request->input('provider'), $request->input('container'));

        $handler = new HandlerFactory($providerData);

        $result = $handler->handle();
        //https://laravel.com/docs/8.x/responses#json-responses
        // response() не привык еще к этому
        return response()->json($handler->handle());
    }
}

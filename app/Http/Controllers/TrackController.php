<?php

namespace App\Http\Controllers;

use App\Modules\Common\Dto\ProviderDto;
use App\Modules\Common\ProviderHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrackController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Http\Response $response
     *
     * @return Response
     */
    public function track(Request $request, Response $response): Response
    {
        $provider = new ProviderDto($request->get('provider'), $request->post('container'));

        $handler = new ProviderHandler($provider);

        return $response->setContent($handler->handle())->header('Content-Type', 'text/json');
    }
}

<?php


namespace App\Modules\Common;

use App\Modules\Common\Dto\ResponseDto;
use App\Modules\Common\Resolver\ResolverFactory;
use Exception;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractProvider
{
    private Client $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function track(string $url): ResponseDto
    {
        $response = $this->makeRequest($url);

        return $this->responseHandler($response);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function makeRequest(string $url, string $method = 'GET'): ResponseInterface
    {
        return $this->httpClient->request($method, $url);
    }


    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return \App\Modules\Common\Dto\ResponseDto
     * @throws \Exception
     */
    private function responseHandler(ResponseInterface $response): ResponseDto
    {
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Handler Error');
        }

        $resolver = ResolverFactory::createResolver((string)$response->getHeader('Content-Type'));

        return $resolver->resolveResult($response->getBody());
    }

}

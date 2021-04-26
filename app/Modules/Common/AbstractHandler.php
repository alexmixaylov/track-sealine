<?php


namespace App\Modules\Common;


use App\Modules\Common\Dto\ResponseDto;
use App\Modules\Common\Resolver\ResolverFactory;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use function explode;

abstract class AbstractHandler
{
    private Client $httpClient;

    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    abstract public function getUrl(string $container): string;

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
            throw new \Exception('Handler Error');
        }

        $content     = $response->getBody()->getContents();
        $contentType = $response->getHeaders()['Content-Type'][0] ?? 'application/json';

        $resolver = ResolverFactory::createResolver(explode(';',$contentType)[0]);

        return $resolver->resolveResult($content);
    }
}

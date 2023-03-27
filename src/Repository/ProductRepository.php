<?php

namespace App\Repository;

use App\Entity\Collection\ProductCollection;
use App\Entity\Product;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductRepository
{
    private const BASE_URL = 'https://global.atdtravel.com/api/products';
    private const GEO = 'en';
    private const LIMIT = 10;
    private const OFFSET = 1;

    /**
     * @param HttpClientInterface $client
     */
    public function __construct(
        private HttpClientInterface $client
    ) {}

    /**
     * @param string $parameters
     * @return ProductCollection
     */
    public function getData(string $parameters): ProductCollection
    {
        $productCollection = new ProductCollection();
        $api = $this->makeCall($parameters);

        if (count($api) > 1) {
            foreach ($api["data"] as $data) {
                $product = new Product($data['title'], $data['img_sml'], $data['dest']);

                $productCollection->add($product);
            }
        }

        return $productCollection;
    }

    /**
     * @param string $parameters
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    private function makeCall(string $parameters): array
    {
        $response = [];

        try {
            $result = $this->client->request(
                'GET',
                self::BASE_URL,
                [
                    'query' => [
                        'geo'    => self::GEO,
                        'title'  => $parameters,
                        'limit'  => self::LIMIT,
                        'offset' => self::OFFSET,
                    ]
                ]
            );

            $response = json_decode($result->getContent(), true);
        } catch (\Exception $e) {
            $response[] = $e->getMessage();
        }

        return $response;
    }
}
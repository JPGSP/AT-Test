<?php

namespace App\Tests\Unit;

use App\Entity\Collection\ProductCollection;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->productRepository = new ProductRepository(
          $kernel->getContainer()->get(
              'test.Symfony\Contracts\HttpClient\HttpClientInterface'
          )
        );
    }

    /**
     * @return void
     */
    public function testCollectionOfProductsAreReturned()
    {
        $externalData = $this->productRepository->getData('');

        $this->assertInstanceOf(
            ProductCollection::class,
            $externalData
        );
    }

    /**
     * @return void
     */
    public function testEmptyCollectionOfProductsAreReturnedWhenTitleNoExits()
    {
        $externalData = $this->productRepository->getData('pepe');

        $this->assertEquals(
            0,
            $externalData->count()
        );
    }

    /**
     * @return void
     */
    public function
    testCollectionOfTenProductsAreReturnedByDefaultWhenTitleExits()
    {
        $externalData = $this->productRepository->getData('disney');

        $this->assertEquals(
            10,
            $externalData->count()
        );
    }
}
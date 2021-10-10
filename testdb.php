<?php

namespace App\Tests;

use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BookTest extends KernelTestCase
{



    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }




    public function testCount() {


        $book = $this->entityManager
        ->getRepository(Book::class)
        ->findAll() ;

    

        $this->assertEquals(20, count($book)) ;


    }



    public function testFirstElement() {

        $book = $this->entityManager
        ->getRepository(Book::class)
        ->findOneBy(["id" => 2]) ;


        $this->assertEquals('product 1' , $book->getTitle()) ;

    }





    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }



}

<?php

namespace App\Tests;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BookValidityTest extends KernelTestCase
{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        //$routerService = self::$container->get('router');
        //$myCustomService = self::$container->get(CustomService::class);
    }


    public function testValidity() : void
    {

        $book = new Book();
        $book->setTitle('Hello') ;
        $book->setDescription("Hello les amis") ;
        $book->setPrice(15) ;
        self::bootKernel() ;
        $errors  =self::$container->get('validator')->validate($book) ;
   
        $this->assertCount(0, $errors) ;
        
    }
}



   public function testBlankTtitle() : void
{

    $book = new Book();
    $book->setTitle('') ;
    $book->setDescription("Hello les amis") ;
    $book->setPrice(1.5) ;
    self::bootKernel() ;
    $errors  =self::$container->get('validator')->validate($book) ;


    $this->assertNotEquals(0, count($errors)) ;
    $this->assertCount(1, $errors);

}


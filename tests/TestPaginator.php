<?php

namespace Ilex\Test;

class TestPaginator extends \PHPUnit_Framework_TestCase
{
    
    public function test1()
    {
        $paginator = new \Ilex\Utility\Paginator(5, 10);
        $paginator->setCurentPage(53, 1);
        $paginator->calPaginator();
        
        $this->assertEquals(1, $paginator->getDisplayFrom());
        $this->assertEquals(10, $paginator->getDisplayTo());
        
        $this->assertFalse($paginator->hasPreviousPage());
        $this->assertTrue($paginator->hasNextPage());

        $this->assertEquals(2, $paginator->getNextPage());
        $this->assertEquals(1, $paginator->getPageSectionStart());
        $this->assertEquals(5, $paginator->getPageSectionEnd());
        
        $this->assertEquals(53, $paginator->itemTotal);
        $this->assertEquals(1, $paginator->currentPage);
        $this->assertEquals(6, $paginator->lastPage);
    }
    
    public function test2()
    {
        $paginator = new \Ilex\Utility\Paginator(5, 10);
        $paginator->setCurentPage(53, 3);
        $paginator->calPaginator();
        
        $this->assertEquals(21, $paginator->getDisplayFrom());
        $this->assertEquals(30, $paginator->getDisplayTo());
        
        $this->assertTrue($paginator->hasPreviousPage());
        $this->assertTrue($paginator->hasNextPage());

        $this->assertEquals(2, $paginator->getPreviousPage());
        $this->assertEquals(4, $paginator->getNextPage());
        
        $this->assertEquals(1, $paginator->getPageSectionStart());
        $this->assertEquals(5, $paginator->getPageSectionEnd());
        
        $this->assertEquals(53, $paginator->itemTotal);
        $this->assertEquals(3, $paginator->currentPage);
        $this->assertEquals(6, $paginator->lastPage);
    }
    
    public function test3()
    {
        $paginator = new \Ilex\Utility\Paginator(5, 10);
        $paginator->setCurentPage(53, 6);
        $paginator->calPaginator();
        
        $this->assertEquals(51, $paginator->getDisplayFrom());
        $this->assertEquals(53, $paginator->getDisplayTo());
        
        $this->assertTrue($paginator->hasPreviousPage());
        $this->assertFalse($paginator->hasNextPage());

        $this->assertEquals(5, $paginator->getPreviousPage());
        
        $this->assertEquals(6, $paginator->getPageSectionStart());
        $this->assertEquals(6, $paginator->getPageSectionEnd());
        
        $this->assertEquals(53, $paginator->itemTotal);
        $this->assertEquals(6, $paginator->currentPage);
        $this->assertEquals(6, $paginator->lastPage);
    }
    
    public function test4(){
        $paginator = new \Ilex\Utility\Paginator(5, 10);
        $paginator->setCurentPage(0, 0);
        $paginator->calPaginator();
        
        $this->assertEquals(0, $paginator->getDisplayFrom());
        $this->assertEquals(0, $paginator->getDisplayTo());
        
        $this->assertFalse($paginator->hasPreviousPage());
        $this->assertFalse($paginator->hasNextPage());
        
        $this->assertEquals(1, $paginator->getPageSectionStart());
        $this->assertEquals(1, $paginator->getPageSectionEnd());
    }
}

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
        
        $this->assertFalse($paginator->getPreviousPage());
        $this->assertTrue($paginator->hasNextPage());

        $this->assertEquals(2, $paginator->getNextPage());
        $this->assertEquals(1, $paginator->getPageSectionStart());
        $this->assertEquals(6, $paginator->getPageSectionEnd());
        
        $this->assertEquals(53, $paginator->itemTotal);
        $this->assertEquals(1, $paginator->currentPage);
        $this->assertEquals(6, $paginator->currentPage);
    }
}

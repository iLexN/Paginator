<?php

namespace Ilex\Utility;

class Paginator
{
    /**
     * number of page per section
     * @var int
     */
    private $pagePerSection;
    
    /**
     * number of item show per page
     * @var type
     */
    private $itemPerPage;
    
    /**
     * total item
     * @var int
     */
    public $itemTotal;
    
    /**
     * current page
     * @var int
     */
    public $currentPage;
    
    /**
     * last page nunber
     * @var int
     */
    public $lastPage;
    
    /**
     * for cal , number of item already showed
     * @var int
     */
    private $itemShowed;
    
    /**
     * for cal , number of page per Section
     * @var int
     */
    private $pageSection;

    /**
     *
     * @param int $pagePerSection number of page Per Section
     * @param int $itemPerPage number of item per page
     */
    public function __construct($pagePerSection, $itemPerPage)
    {
        $this->pagePerSection = $pagePerSection;
        $this->itemPerPage = $itemPerPage;
    }
    
    /**
     * set current page
     * @param type $itemTotal number of total
     * @param type $currentPage current page
     */
    public function setCurentPage($itemTotal, $currentPage)
    {
        $this->itemTotal = $itemTotal;
        if ($currentPage <= 0) {
            $this->currentPage = 1;
        } else {
            $this->currentPage = $currentPage;
        }
    }
    
    /**
     * cal paginator process
     */
    public function calPaginator()
    {
        $this->calTotalPage();
        $this->calItemShow();
        $this->calPageSection();
    }
    
    /**
     * cal number of total page
     */
    private function calTotalPage()
    {
        $this->lastPage = ceil($this->itemTotal / $this->itemPerPage);
        if ($this->lastPage == 0) {
            $this->lastPage = 1;
        }
    }
    
    /**
     * cal number item showed
     */
    private function calItemShow()
    {
        if ($this->currentPage <= $this->lastPage) {
            $this->itemShowed = ($this->currentPage - 1) * $this->itemPerPage;
        } else {
            $this->currentPage = 1;
            $this->itemShowed = 0;
        }
    }
    
    /**
     * cal page section
     */
    private function calPageSection()
    {
        $this->pageSection = ceil($this->currentPage / $this->pagePerSection);
    }
    
    /**
     * display from
     * @return int
     */
    public function getDisplayFrom()
    {
        if ($this->itemTotal == 0) {
            return 0;
        } else {
            return $this->itemShowed + 1;
        }
    }
    
    /**
     * display to
     * @return int
     */
    public function getDisplayTo()
    {
        $displayTo = $this->itemShowed + $this->itemPerPage;
        if ($displayTo > $this->itemTotal) {
            $displayTo = $this->itemTotal;
        }
        return $displayTo;
    }
    
    /**
     * previous page
     * @return int
     */
    public function getPreviousPage()
    {
        return $this->currentPage - 1;
    }
    
    /**
     * has previous page
     * @return boolean
     */
    public function hasPreviousPage()
    {
        $previousPage = $this->getPreviousPage();
        if ($previousPage > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * have next page
     * @return boolean
     */
    public function hasNextPage()
    {
        if ($this->currentPage < $this->lastPage) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * get next page
     * @return int
     */
    public function getNextPage()
    {
        return $this->currentPage + 1;
    }
    
    /**
     * page start number for loop
     * @return int
     */
    public function getPageSectionStart()
    {
        return (($this->pageSection - 1) * $this->pagePerSection) + 1;
    }
    
    /**
     * page end number for loop
     * @return int
     */
    public function getPageSectionEnd()
    {
        $section_page_end = $this->pageSection * $this->pagePerSection;
        if ($section_page_end > $this->lastPage) {
            $section_page_end = $this->lastPage;
        }
        return $section_page_end;
    }
    
    /**
     * sql helper method , limit
     * @return type
     */
    public function getSqlLimit()
    {
        return $this->itemPerPage;
    }
    
    /**
     * sql helper method , offset
     * @return type
     */
    public function getSqlOffset(){
        return $this->getDisplayFrom() - 1;
    }
}

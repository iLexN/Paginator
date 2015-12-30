[![Build Status](https://travis-ci.org/iLexN/Paginator.svg?branch=master)](https://travis-ci.org/iLexN/Paginator)
[![Coverage Status](https://coveralls.io/repos/iLexN/Paginator/badge.svg?branch=master&service=github)](https://coveralls.io/github/iLexN/Paginator?branch=master)

#Paginator
- get the pagination data
- use the data for custom html/style

#Example

    //config
    $pagePerSection = 5;
    $itemPerPag = 10;
    $paginator = new \Ilex\Utility\Paginator($pagePerSection, $itemPerPage);

    //sql count
    $itemTotal = 35; // select count from tableName where colName = 'DoReMe' 
    $currentPage = is_set($page)?$page:1;

    $paginator->setCurentPage($itemTotal, $currentPage);

    // sql for find item
    $yourItem = ; // select somthing from tableName where colName = 'DoReMe' 
                  // limit {$paginator->getSqlOffset()} , {$paginator->getSqlLimit()}

#View (html or template system )

    <?php if( $paginator->hasPreviousPage() ) {?>
        <a href="url?page=<?=$paginator->getPreviousPage()?>">Previous Page</a> &nbsp;
    <?php } ?>

    <?php $start = $paginator->getPageSectionStart() ;
          $end = $paginator->getPageSectionEnd() ;
        for ( $i = $start ; $i <= $end ; $i++ ) { ?>
        <?php if ( $i == $paginator->currentPage ) { ?>
            <span style="color:green;font-weight:bold;">[<?=$i?>]</span> &nbsp;
        <?php } else { ?>
            <a href="url?page=<?=$i?>"><?=$i?></a> &nbsp;
        <?php } ?>
    <?php } ?>

    <?if( $paginator->hasNextPage() ) {?>
        <a href="url?page=<?=$paginator->getNextPage()?>">Next Page</a> &nbsp;
    <? } ?>

can use <ul><li></li></ul> or <div></div> just you like.
@if ($paginator->hasPages())
    <nav style="width: fit-content" class="td-page-navigation">
        <ul class="pagination">
            @if ($paginator->onFirstPage())

            @else
                <li class="pagination-arrow"><a href="{{ $paginator->previousPageUrl() }}"><i
                            class="fa fa-angle-double-left"></i></a></li>
            @endif

            @php

                if (!isset($_GET['page'])) {
                              $page = 1;
                            }else{
                              $page = $_GET['page'];
                        }

                        $number_of_pages = $query->total();

                    // Middle

                    if ($number_of_pages < 6) {

                        foreach ($elements as $element){

                        foreach ($element as $page => $url) {
                            if ($page == $paginator->currentPage()){
                                echo '<li><a class="active" onclick="" href="javascript:void(0)">'.$page.'</a></li>';
                            }else{
                                echo '<li><a href="'.$url.'">'.$page.'</a></li>';
                            }

                        }
                        }

                    }else{

                        if ($page != 1 && $page != 2 && $page != $number_of_pages-1 && $page != $number_of_pages) {
                            for ($i=$page-2; $i <=$page+2 ; $i++) {
                                if ($i == $page) {

                                    echo '<li><a class="active" onclick="" href="javascript:void(0)">'.$i.'</a></li>';

                                }else{
                                    if (isset($elements[0][$i])){
                                         echo '<li><a href="'.$elements[0][$i].'">'. $i .'</a></li>';
                                    }
                                }

                            }
                        }else if ($page == 1 || $page == 2) {
                            for ($i=1; $i <=5 ; $i++) {
                                if ($i == $page) {

                                    echo '<li><a class="active" onclick="" href="javascript:void(0)">'.$i.'</a></li>';

                                }else{

if (isset($elements[0][$i])){
                                         echo '<li><a href="'.$elements[0][$i].'">'. $i .'</a></li>';
                                    }                                }

                            }
                        }else if ($page == $number_of_pages-1 || $page == $number_of_pages) {
                            for ($i=$number_of_pages-4; $i <=$number_of_pages ; $i++) {
                                if ($i == $page) {

                                    echo '<li><a class="active" onclick="" href="javascript:void(0)">'.$i.'</a></li>';

                                }else{

if (isset($elements[0][$i])){
                                         echo '<li><a href="'.$elements[0][$i].'">'. $i .'</a></li>';
                                    }                                }

                            }
                        }

                    }


    // /Middle

            @endphp

            @if ($paginator->hasMorePages())
                <li class="pagination-arrow"><a href="{{ $paginator->nextPageUrl() }}"><i
                            class="fa fa-angle-double-right"></i></a></li>
            @else

            @endif
        </ul>
    </nav>
 @endif


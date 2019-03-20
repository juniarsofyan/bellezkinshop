<?php
$useragent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))):
    if (!isset($_GET['ch']) || $_GET['ch'] != "konsultasi"): ?>
        <div id='kotak'>
            OFFICIALLY BELLEZKIN ONLINE SHOP<br>Enjoy our periodically discount program
            <div id='joinreseller'>LOGIN RESELLER</div>
        </div>
    <?php endif; ?>

        <!-- menu-bar mobile -->
        <nav>
            <div class='w3-row'>
                <div class='w3-col'>
                    <ul id='menu-ul'>
                        <li class='drpdwn'>
                            <a href='javascript:void(0)' class='drpbtn nav-tog'>
                                <span>&#8801;</span>
                            </a>
                            <div class='drpdwn-cont'>
                                <a href='#'>BRIGHTENING</a>
                                <a href='#'>PURIFY</a>
                                <a href='#'>DECORATIVE</a>
                                <a href='#'>EXTRA CARE</a>
                                <a href='#' id='bc'>Beauty Consultant</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class='w3-col' align='center'>
                    <div class='logo'>BE-SHOP</div>
                </div>
                <div class='w3-col'>
                    <div id='marked'>
                        <i class='fa fa-heart' style='font-size:16px;'></i>&nbsp;&nbsp;&nbsp;
                        <i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;&nbsp;
                        <i class='fa fa-user'></i>
                    </div>
                </div>
            </div>
        </nav>

    <!-- Slider untuk shop (index) -->
    <?php if (isset($_GET['ch']) && $_GET['ch'] == "shop" || !isset($_GET['ch'])) : ?>
        <div id='demo' class='carousel slide' data-ride='carousel'>
            <ul class='carousel-indicators'>
                <li data-target='#demo' data-slide-to='0' class='active'></li>
                <li data-target='#demo' data-slide-to='1'></li>
                <li data-target='#demo' data-slide-to='2'></li>
            </ul>
            <div class='carousel-inner'>
                <div class='carousel-item active'>
                    <img src='http://localhost/bellezkin-shop/public/assets/img/slider/small1.jpg' alt='Slide-1' width='400' height='400'>
                </div>
                <div class='carousel-item'>
                    <img src='http://localhost/bellezkin-shop/public/assets/img/slider/small2.jpg' alt='Slide-2' width='400' height='400'>
                </div>
                <div class='carousel-item'>
                    <img src='http://localhost/bellezkin-shop/public/assets/img/slider/small3.jpg' alt='Slide-3' width='400' height='400'>
                </div>
            </div>
        </div>
    <?php endif; ?>
        
    <!-- ProgressBar untuk cart (keranjang belanja) -->
    <?php if (isset($_GET['ch']) && $_GET['ch'] == "cart"): ?>
        <div class='w3-row'>
            <div class='cont-gress'>
                <ul class='progressbar'>
                    <li class='active'>my cart</li>
                    <li>check out</li>
                    <li>payment</li>
                    <li>history order</li>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <!-- Banner untuk halaman konsultasi -->
    <?php if (isset($_GET['ch']) && $_GET['ch'] == "konsultasi"): ?>
        <div class='w3-row'>
            <img src='http://localhost/bellezkin-shop/public/assets/img/slider/small2.jpg' />
        </div>
    <?php endif; ?>

<?php else: ?>
    <?php if (!isset($_GET['ch']) || $_GET['ch'] != "konsultasi"): ?>
        <div id='kotak'>
            OFFICIALLY BELLEZKIN ONLINE SHOP | Enjoy our periodically discount program
            <div id='joinreseller'>LOGIN RESELLER</div>
        </div>
    <?php endif; ?>

    <!-- menu-bar desktop -->
    <nav>
        <div class='w3-row'>
            <div class='w3-quarter w3-container'>
                <div class='logo'>BE-SHOP</div>
            </div>
            <div class='w3-half w3-container'>
                <ul id='menu-ul'>
                    <li class='drpdwn'>
                        <a href='javascript:void(0)' class='drpbtn'>BRIGHTENING</a>
                        <div class='drpdwn-cont'>
                            <a href='#'>Produk #1</a>
                            <a href='#'>Produk #2</a>
                            <a href='#'>Produk #3</a>
                        </div>
                    </li>
                    <li class='drpdwn'>
                        <a href='javascript:void(0)' class='drpbtn'>PURIFY</a>
                        <div class='drpdwn-cont'>
                            <a href='#'>Produk #1</a>
                            <a href='#'>Produk #2</a>
                            <a href='#'>Produk #3</a>
                        </div>
                    </li>
                    <li class='drpdwn'>
                        <a href='javascript:void(0)' class='drpbtn'>DECORATIVE</a>
                        <div class='drpdwn-cont'>
                            <a href='#'>Produk #1</a>
                            <a href='#'>Produk #2</a>
                            <a href='#'>Produk #3</a>
                        </div>
                    </li>
                    <li class='drpdwn'>
                        <a href='javascript:void(0)' class='drpbtn'>EXTRA CARE</a>
                        <div class='drpdwn-cont'>
                            <a href='#'>Produk #1</a>
                            <a href='#'>Produk #2</a>
                            <a href='#'>Produk #3</a>
                        </div>
                    </li>
                    <li class='menus'><a href='#'>Beauty Consultant</a></li>
                </ul>
            </div>
            <div class='w3-quarter w3-container'>
                <div class='search-container'>
                    <form action='#'>
                        <input type='text' placeholder='Search..' name='search'>
                        <button type='submit'><i class='fa fa-search'></i></button>
                    </form>
                </div>
                <div id='marked'>
                    <i class='fa fa-heart' style='font-size:20px;'></i>&nbsp;&nbsp;
                    <i class='fa fa-shopping-cart'></i>&nbsp;&nbsp;
                    <i class='fa fa-user'></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Slider untuk shop (index) -->
    <?php if ((isset($_GET['ch']) && $_GET['ch'] == "shop") || !isset($_GET['ch'])): ?>
        <div id='demo' class='carousel slide' data-ride='carousel'>
            <ul class='carousel-indicators'>
                <li data-target='#demo' data-slide-to='0' class='active'></li>
                <li data-target='#demo' data-slide-to='1'></li>
                <li data-target='#demo' data-slide-to='2'></li>
            </ul>
            <div class='carousel-inner'>
                <div class='carousel-item active'>
                    <img src='http://localhost/bellezkin-shop/public/assets/img/slider/large1.jpg' alt='Slide-1' width='1600' height='400'>
                </div>
                <div class='carousel-item'>
                    <img src='http://localhost/bellezkin-shop/public/assets/img/slider/large2.jpg' alt='Slide-2' width='1600' height='400'>
                </div>
                <div class='carousel-item'>
                    <img src='http://localhost/bellezkin-shop/public/assets/img/slider/large3.jpg' alt='Slide-3' width='1600' height='400'>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- ProgressBar untuk cart (keranjang belanja) -->
    <?php if (isset($_GET['ch']) && $_GET['ch'] == "cart"): ?>
        <div class='w3-row'>
            <div class='cont-gress'>
                <ul class='progressbar'>
                    <li class='active'>my cart</li>
                    <li>check out</li>
                    <li>payment</li>
                    <li>history order</li>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <!-- Banner untuk halaman konsultasi -->
    <?php if (isset($_GET['ch']) && $_GET['ch'] == "konsultasi"): ?>
        <div class='w3-row'>
            <img src='http://localhost/bellezkin-shop/public/assets/img/slider/large2.jpg' />
        </div>
    <?php endif; ?>

    <!-- Breadcrumbs semua halaman -->
    <?php if (isset($_GET['ch']) && $_GET['ch'] <> ""):
        switch ($_GET['ch']):
            case "shop": $path = "Home &nbsp;>&nbsp; Products"; break;
            case "cart": $path = "Home &nbsp;>&nbsp; Products &nbsp;>&nbsp; My Cart"; break;
            case "konsultasi": $path = "Home &nbsp;>&nbsp; Beauty Consultant"; break;
            default: $path = "Home &nbsp;>&nbsp; Products"; break;
        endswitch;
    ?>
        <div class='w3-row'>
            <div id='breadcrumbs'><?php echo $path ?></div>
        </div>
    <?php endif; ?>
<?php endif; ?>
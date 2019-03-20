<?php $this->load->view('includes/header'); ?>
    

<!-- main page -->
<?php
    if (isset($_GET['ch']) && $_GET['ch'] <> "") {
        switch ($_GET['ch']) {
            case "shop": include('product.php'); break;
            case "cart": include('cart.php'); break;
            case "konsultasi": include('konsult.php'); break;
            default: include('product.php'); break;
        }
    } else {
        // include('product.php');
    }
?>

<!-- banner -->
<?php
    if (isset($_GET['ch']) && $_GET['ch'] == "shop" || !isset($_GET['ch'])) {
        $this->load->view('includes/banner');
    }
?>

<!-- footer -->
<?php $this->load->view('includes/footer'); ?>
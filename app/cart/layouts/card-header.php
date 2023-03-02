<!-- Card header -->
<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
            <a class="nav-link <?= ($current_page_name == 'cart' ? 'active' : 'disabled') ?> " aria-current="true" href="<?= asset('/app/cart/cart.php') ?>">1 Your cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page_name == 'cart-contact' ? 'active' : 'disabled') ?> <?= (!isset($_SESSION['totalProducts']) || $_SESSION['totalProducts'] < 1)? 'd-none' : ''?> " href="<?= asset('/app/cart/cart-contact.php') ?>"> 2 Contact info</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link <?= ($current_page_name == 'cart-address' ? 'active' : 'disabled') ?> <?= (!isset($_SESSION['totalProducts']) || $_SESSION['totalProducts'] < 1)? 'd-none' : ''?> " href="<?= asset('/app/cart/cart-address.php') ?>">3 Address</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link <?= ($current_page_name == 'cart-checkout' ? 'active' : 'disabled') ?> <?= (!isset($_SESSION['totalProducts']) || $_SESSION['totalProducts'] < 1)? 'd-none' : ''?> " href="<?= asset('/app/cart/cart-checkout.php') ?>"> 4 Checkout</a>
        </li>
    </ul>
</div>
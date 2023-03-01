<!-- Card header -->
<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
            <a class="nav-link <?= ($current_page_name == 'cart' ? 'active' : '') ?> " aria-current="true" href="<?= asset('/app/cart/cart.php') ?>">Your cart</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($current_page_name == 'cart-email' ? 'active' : '') ?>" href="<?= asset('/app/cart/cart-email.php') ?>">Email</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link <?= ($current_page_name == 'cart-address' ? 'active' : '') ?>" href="<?= asset('/app/cart/cart-address.php') ?>">Address</a>
        </li>
    </ul>
</div>
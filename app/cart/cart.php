<?php
//require Files
require_once '../../functions/helpers.php';

//The Current Page Filename
$current_page_name = basename($_SERVER['PHP_SELF'], 'php');

//Time Zone Sweden
date_default_timezone_set("Europe/Stockholm");
$format = "Y/m/d H:i:s"; //2023/02/07 18:48:54

//START SESSION
session_start();

?>

<?php require_once '../../layouts/head.php' ?>

<div class="col-md-5 col-lg-4 order-md-last">
  <h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-primary">Your cart</span>
    <span class="badge bg-primary rounded-pill">3</span>
  </h4>
  <ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-sm">
      <div>
        <h6 class="my-0">Product name</h6>
        <small class="text-muted">Brief description</small>
      </div>
      <span class="text-muted">$12</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-sm">
      <div>
        <h6 class="my-0">Second product</h6>
        <small class="text-muted">Brief description</small>
      </div>
      <span class="text-muted">$8</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-sm">
      <div>
        <h6 class="my-0">Third item</h6>
        <small class="text-muted">Brief description</small>
      </div>
      <span class="text-muted">$5</span>
    </li>
    <li class="list-group-item d-flex justify-content-between bg-light">
      <div class="text-success">
        <h6 class="my-0">Promo code</h6>
        <small>EXAMPLECODE</small>
      </div>
      <span class="text-success">−$5</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
      <span>Total (USD)</span>
      <strong>$20</strong>
    </li>
  </ul>

  <form class="card p-2">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Promo code">
      <button type="submit" class="btn btn-secondary">Redeem</button>
    </div>
  </form>
</div>


<div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="#">Active</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
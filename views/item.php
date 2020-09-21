<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class=" col-md-12">
    <div class="col-md-6">
        <h6 class="bold">Name</h6>
        <p><?= $item->item->name ?></p>
    </div>
    <div class="col-md-3">
        <h6 class="bold">Purchased</h6>
        <p><?= _dt($item->sold_at) ?></p>
    </div>
    <div class="col-md-3">
        <h6 class="bold">Support Expires</h6>
        <p class="label label-<?= envato_date_label($item->supported_until) ?>"><?= _dt($item->supported_until)  ?></p>
    </div>

    <div class=" col-md-12 row">
        <div class="col-md-3">
            <h6 class="bold">Username</h6>
            <p class="label label-info"><?= $item->buyer ?></p>
        </div>
        <div class="col-md-3">
            <h6 class="bold">Type</h6>
            <p><?= $item->license ?></p>
        </div>
        <div class="col-md-3">
            <h6 class="bold">Number Of Licences</h6>
            <p><?= $item->purchase_count ?></p>
        </div>
        <div class="col-md-3">
            <h6 class="bold">$installation</h6>
            <p><?= $website ?></p>
        </div>
    </div>
</div>
<div class=" clearfix"></div>
<hr>

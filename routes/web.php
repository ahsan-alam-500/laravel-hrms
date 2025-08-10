<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   throw new \Exception('405');
});

<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Modules\Modules\Auth\Query\AuthQuery;
use Modules\Modules\Auth\Query\AuthQueryHandler;

Artisan::command('inspire', function () {

    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

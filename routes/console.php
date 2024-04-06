<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;


Artisan::command('inspire', function () {
    dd(DB::table('oauth_clients')->get()->toArray());
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\App;

class Helpers
{
    public function getLocals()
    {

        $locale = App::currentLocale();
        if (App::isLocale('en')) {
            return 'en';
        } elseif (App::isLocale('ar')) {
            return 'ar';
        } elseif (App::isLocale('kr')) {
            return 'kr';
        }
    }
}

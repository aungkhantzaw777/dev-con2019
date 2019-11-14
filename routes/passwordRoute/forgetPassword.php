<?php

namespace Routes\passwordRoute;

use Route;

class forgetPassword
{
    public static function routes()
    {
        Route::get('/forget-password', function() {
            return 'work';
        });
    }
}
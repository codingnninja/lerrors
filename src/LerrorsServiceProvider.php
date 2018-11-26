<?php

/*
 * This file is part of the Laravel Lerrors package.
 *
 * (c) Ogundiran Ayobami <ayobami_ogundiran@yahoo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Codingnninja\Lerrors;

use Exception;
use Illuminate\Support\ServiceProvider;
use Codingnninja\Lerrors\Store\Store;


class LerrorsServiceProvider extends ServiceProvider
{

    /*
    * Indicates if loading of the provider is deferred.
    *
    * @var boolean
    */
    protected $defer = false;

    /**
    * Register the application services.
    */
    public function register()
    {
        $this->app->bind('Lerrors', function () {

            return new Lerrors(
                new Store,
                new Exception
            );

        });
    }

    /**
    * Get the services provided by the provider
    * @return array
    */
    public function provides()
    {
        return ['Lerrors'];
    }
}

<?php

/*
 * This file is part of the Laravel Lerrors package.
 *
 * (c) Ogundiran Ayobami <ayobami_ogundiran@yahoo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Codingnninja\Lerrors\Facades;

use Illuminate\Support\Facades\Facade;

class Lerrors extends Facade
{
    /**
     * Get the registered name of the component
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Lerrors';
    }
}

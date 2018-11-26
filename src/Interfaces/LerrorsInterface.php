<?php

namespace Codingnninja\Lerrors\Interfaces;

use Exception;

interface LerrorsInterface
{
    /**
    *find a matching solution to any given error
    *@param Exception class or stirng $exception->getMessage()
    *@return view
    */
    public function track(Exception $error);
}

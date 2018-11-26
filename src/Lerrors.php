<?php
namespace Codingnninja\Lerrors;

use Exception;
use Codingnninja\Lerrors\Interfaces\LerrorsInterface;
use Codingnninja\Lerrors\Store\Store;

class Lerrors extends Exception implements LerrorsInterface
{
    private $store;

    public function __construct(Store $store){
        $this->store = $store;
    }
     /**
    *find a matching solution to any given error
    *@param Exception class or stirng $exception->getMessage()
    *@return view
    */

    public function track(Exception $exception)
    {

        if(is_string($exception)){

            $solution = $this->store
                             ->getError($exception)
                             ->getSolution();   
        }else{
        //var_dump($exception->getMessage());

            $solution = $this->store
                             ->getError($exception->getMessage())
                             ->getSolution();
        }
         $exception->message .= ". "."Solution: $solution";
        return $exception;
    }
}

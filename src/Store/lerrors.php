<?php

/*
 * This file is part of the Laravel Lerrors package.
 *
 * (c) Ogundiran Ayobami <ayobami_ogundiran@yahoo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Codingnninja\Lerrors\Store;

class Store
{
    private $errors = [
        
        /***********************************Error: }, :, ; Missing in file***************************************/
            "unexpectedPublicFunction" => "syntax error, unexpected",

        /***********************************Error: Undefined variable in file***********************************/
            "undefinedvariable" => "Undefined variable:",

        /***********************************Error: Relationship not returned in file****************************/
            "relationshipNotReturned" => "Call to a member function getRelationExistenceCountQuery() on null",

        /**********************************Error: This matches any error message that contains "does not exist"*/
        //Todo: Maybe it should just match the current error instead of all non existing stuff
            "notExist" => "does not exist",
            
        /*********************************Error: This matches any error message that contains "not found*****/
        //Todo: it should just match the current error instead of all non found stuff
            "notFoundInDestination" => "not found."

        ];

    private $solutions = [
        /***********************************Solution to Error: @CSRF Missing in form****************************/ 
            '@csrfIsMissingInForm' => 'Make sure you include @csrf in any laravel form to solve this problem. Check https://laravel.com/docs/5.7/blade',
        
        /***********************************Solution to Error: @CSRF Missing in form****************************/ 
            'unexpectedPublicFunction' => 'This is a syntax error caused by a missing  "{",  "}", "," , ";", ":" or other typographical errors; this error is always caused by mistakes in typing. If anything such as function, variable, etc., is highlighted above or anywhere within the whole of the stacktraces; the statement above the highlighed syntax or the highlighted syntax is probably missing any of the listed signs or other; It is better to install a php linting package for your editor to help you correct the error within your editor. Check this for php linting packages: https://lerrors.com/ide and this https://lerrors.com/php/laravel/unexpectedPublicFunction for further explation',

        /***********************************Solution to Error: @CSRF Missing in form****************************/ 
            'undefinedvariable' => 'Whenever there is an undefined variable error, check the variable highlighted in the file mentioned to confirm whether it is defined or passed down to the file or not; Then, define the variable or remove it.',

        /***********************************Solutio to Error: Relationship not returned in file*****************/
            'relationshipNotReturned' => '"return" is missing in one or more relationship methods. Check your application models and add "return" to $this->hasMany(), $this->belongTo(), etc., methods. E.g return $this->hasMany().',

        /***********************************Solutio to Error: Relationship not returned in file*****************/
            'methodNotExist'=> ' Case 1 (If this is a method):This method is not defined or is mispelt. It may also be missing $this. If the method exists within a class, it can only be called as in $this->methodName().
            Case 2 (If this is a class): The class is probably not defined or is mispelt. Create the class or fix the typo then run composer dump-autoload in the console from your application root directory.',

             'notFoundInDestination' => 'This is not found at its destination probably because the file does not exist or its name is mispelt. Check the file again to be sure.',


        /***********************************Solution:Fallback for errors not listed in this package*****************/
            'notFound' => 'The error is not listed in this package but below information may help:
            Case 1: If you see error: The page has expired due to inactivity. Please refresh and try again. You need to reload the page or add @csrf to your form.
     
            Case 2: https://lerrors.com/withoutErrors would contain the solution to this problem or try checking if __construct() is not mispelt, run composer dump-autoload; if it is still not working, please contribute the error and its solution to this package to prevent others from facing the same challenges you faced in solving the problem. Thanks in advance.'

        /***********************************************************************************************************/
        ];

    private $errorKey;

    /**
     * Get key for the matching error message
     *@param string $errorMsg
     *@return array key
     */
    public function getError($errorMsg)
    {   
        $this->errorMsg = $errorMsg;     
        $matchedError = array_filter($this->errors, array($this, "filterFunction"));

        if($matchedError){
            $this->errorKey = key($matchedError);
        }

        if(empty($matchedError)){
            $this->errorKey = "notFound";
        }

        return $this;
    }

    /**
     * Get the matching solution for errorKey
     *@param string $errorKey
     *@return string
     */

    public function getSolution()
    {
        $solution = $this->solutions[$this->errorKey];
        return $solution;

    }

    public function filterFunction($error)
    {
        if(stripos($this->errorMsg, $error) !== false){
            return true;
        }
        return false;
    }

}

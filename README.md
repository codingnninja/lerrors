
# LERRORS (Laravel-errors-and-solutions)

>  A laravel package that gives developers super powers to get solutions to laravel errors right in the stack traces through time travelling.

## Installation

[PHP](https://php.net) 5.4+ and [Composer](https://getcomposer.org) are required.


```
composer require "codingnninja/lerrors @dev"

```

## How to use it?

```
You only need to add  

\Lerrors::track($exception);

to the render method that is present in app/Exception/Handler.php

```

## Love this?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the news!

Don't forget to [follow me on twitter](https://twitter.com/ayovision)!

Thanks!
Ayobami.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

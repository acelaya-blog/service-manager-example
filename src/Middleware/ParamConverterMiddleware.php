<?php
namespace Acelaya\Middleware;

use Slim\Middleware;

class ParamConverterMiddleware extends Middleware
{
    /**
     * Call
     *
     * Perform actions specific to this middleware and optionally
     * call the next downstream middleware.
     */
    public function call()
    {
        $this->next->call();
    }
}

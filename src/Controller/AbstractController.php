<?php
namespace Acelaya\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

abstract class AbstractController
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    public function __construct(Request $request, Response $response)
    {

    }
}

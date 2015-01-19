<?php
namespace Acelaya\Mvc;

use Slim\Http\Response;

interface ResponseAwareInterface
{
    /**
     * @param Response $response
     * @return mixed
     */
    public function setResponse(Response $response);

    /**
     * @return Response
     */
    public function getResponse();
}

<?php
namespace Acelaya\Mvc;

use Slim\Http\Request;

interface RequestAwareInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function setRequest(Request $request);

    /**
     * @return Request
     */
    public function getRequest();
}

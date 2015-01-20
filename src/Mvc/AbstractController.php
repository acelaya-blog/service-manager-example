<?php
namespace Acelaya\Mvc;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\View;

abstract class AbstractController implements
    RequestAwareInterface,
    ResponseAwareInterface,
    RendererAwareInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var View
     */
    protected $renderer;

    /**
     * @param Request $request
     * @return mixed
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param Response $response
     * @return mixed
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param View $renderer
     * @return mixed
     */
    public function setRenderer(View $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @return View
     */
    public function getRenderer()
    {
        return $this->renderer;
    }
}

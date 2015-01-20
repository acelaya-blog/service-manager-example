<?php
namespace Acelaya\Mvc;

use Slim\View;

interface RendererAwareInterface
{
    /**
     * @param View $renderer
     * @return mixed
     */
    public function setRenderer(View $renderer);

    /**
     * @return View
     */
    public function getRenderer();
}

<?php
namespace Acelaya\Controller;

use Acelaya\Mvc\AbstractController;
use Acelaya\Service\ItemServiceInterface;

class ItemController extends AbstractController
{
    /**
     * @var ItemServiceInterface
     */
    protected $itemService;

    public function __construct(ItemServiceInterface $itemService)
    {
        $this->itemService = $itemService;
    }

    public function listAction()
    {
        $this->renderer->display('items_list.phtml', ['items' => $this->itemService->getItems()]);
    }

    public function createAction()
    {

    }

    public function updateAction($itemId)
    {

    }

    public function deleteAction($itemId)
    {

    }
}

<?php
namespace Acelaya\Controller;

use Acelaya\Entity\Item;
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
        if ($this->request->isPost()) {
            $user = new Item();
            $user->exchangeArray($this->request->post('item'));
            $this->itemService->createItem($user);
            $this->response->redirect('/items/list');
            return;
        }

        $this->renderer->display('items_create.phtml');
    }

    public function updateAction($itemId)
    {
        $item = $this->itemService->getItem($itemId);

        if ($this->request->isPost()) {
            $item->exchangeArray($this->request->post('item'));
            $this->itemService->updateItem($item);
            $this->response->redirect('/items/list');
            return;
        }

        $this->renderer->display('items_create.phtml', [
            'item' => $item
        ]);
    }

    public function deleteAction($itemId)
    {
        $item = $this->itemService->getItem($itemId);

        if ($this->request->isPost()) {
            $this->itemService->deleteItem($item);
            $this->response->redirect('/items/list');
            return;
        }

        $this->renderer->display('items_delete.phtml', [
            'item' => $item
        ]);
    }
}

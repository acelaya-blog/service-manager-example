<?php
namespace Acelaya\Service;

use Acelaya\Entity\Item;

interface ItemServiceInterface
{
    /**
     * @return Item[]
     */
    public function getItems();

    /**
     * @param $itemId
     * @return Item
     */
    public function getItem($itemId);

    /**
     * @param Item $item
     * @return mixed
     */
    public function createItem(Item $item);

    /**
     * @param Item $item
     * @return mixed
     */
    public function updateItem(Item $item);

    /**
     * @param Item|int $item
     * @return mixed
     */
    public function deleteItem($item);
}

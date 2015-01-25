<?php
namespace Acelaya\Service;

use Acelaya\Entity\Item;

class ItemService extends AbstractService implements ItemServiceInterface
{
    /**
     * @return Item[]
     */
    public function getItems()
    {
        $this->logger->info('Fetching items...');
        $items = $this->objectmanager->getRepository(Item::class)->findAll();
        $this->logger->debug(sprintf('Found %s items', count($items)));
        return $items;
    }

    /**
     * @param $itemId
     * @return Item
     */
    public function getItem($itemId)
    {
        $this->logger->info(sprintf('Fetching item with id %s...', $itemId));
        $item = $this->objectmanager->find(Item::class, $itemId);
        $this->logger->debug(empty($item) ? 'Item not found' : 'Item found');
        return $item;
    }

    /**
     * @param Item $item
     * @return mixed
     */
    public function createItem(Item $item)
    {
        $this->logger->info('Creating new item...');
        $this->objectmanager->persist($item);
        $this->objectmanager->flush();
    }

    /**
     * @param Item $item
     * @return mixed
     */
    public function updateItem(Item $item)
    {
        $this->logger->info(sprintf('Updating item with id %s...', $item->getId()));
        $this->objectmanager->persist($item);
        $this->objectmanager->flush();
    }

    /**
     * @param Item|int $item
     * @return mixed
     */
    public function deleteItem($item)
    {
        if (! $item instanceof Item) {
            $item = $this->getItem($item);
        }
        $this->logger->info(sprintf('Deleting item with id %s...', $item->getId()));
        $this->objectmanager->remove($item);
        $this->objectmanager->flush();
    }
}

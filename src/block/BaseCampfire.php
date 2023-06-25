<?php

namespace DecorativeBlocks\block;

use pocketmine\block\utils\FacesOppositePlacingPlayerTrait;
use pocketmine\block\utils\HorizontalFacingTrait;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\item\ItemTypeIds;
use pocketmine\item\Shovel;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\sound\FizzSound;
use pocketmine\world\sound\FlintSteelSound;

abstract class BaseCampfire extends CustomState
{
    use FacesOppositePlacingPlayerTrait;
    use HorizontalFacingTrait;

    private bool $extinguish = false;

    public function isExtinguished(): bool
    {
        return $this->extinguish;
    }

    public function onInteract(Item $item, int $face, Vector3 $clickVector, ?Player $player = null, array &$returnedItems = []): bool
    {
        if (!$this->extinguish) {
            if ($face === Facing::UP && $item instanceof Shovel) {
                $block = clone $this;
                $block->extinguish = true;

                $this->position->getWorld()->setBlock($this->position, $block);
                $this->position->getWorld()->addSound($this->position, new FizzSound());

                return true;
            }
        } elseif ($item->getTypeId() === ItemTypeIds::FLINT_AND_STEEL) {
            $block = clone $this;
            $block->extinguish = false;

            $this->position->getWorld()->setBlock($this->position, $block);
            $this->position->getWorld()->addSound($this->position, new FlintSteelSound());

            return true;
        }
        return false;
    }

    public function setExtinguish(bool $extinguish): self
    {
        $this->extinguish = $extinguish;
        return $this;
    }

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->horizontalFacing($this->facing);
        $w->bool($this->extinguish);
    }
}
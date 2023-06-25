<?php

namespace DecorativeBlocks\block;

use Closure;
use pocketmine\block\Block;
use pocketmine\block\utils\SupportType;
use pocketmine\data\bedrock\block\BlockStateNames;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\item\Item;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\BlockTransaction;

class Grindstone extends CustomState
{
    protected int $facing = Facing::NORTH;

    protected string $attachment = "standing";
    private int $attachmentInt = 0;

    const ATTACHEMENTS = ["standing", "hanging", "side", "multiple"];

    public function getStateSerialize(): ?Closure
    {
        return fn(Grindstone $block): BlockStateWriter => BlockStateWriter::create(BlockTypeNames::GRINDSTONE)->writeLegacyHorizontalFacing($this->getFacing())->writeString(BlockStateNames::ATTACHMENT, $this->getAttachment());
    }

    public function getFacing(): int
    {
        return $this->facing;
    }

    private function canBeSupportedBy(Block $block, int $face): bool
    {
        return !$block->getSupportType($face)->equals(SupportType::NONE());
    }

    public function place(BlockTransaction $tx, Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, ?Player $player = null): bool
    {
        switch ($face) {
            case Facing::DOWN:
                $this->attachment = self::ATTACHEMENTS[0];
                break;

            case Facing::UP:
                if ($player !== null) {
                    $this->facing = Facing::opposite($player->getHorizontalFacing());
                }
                $this->attachment = self::ATTACHEMENTS[1];
                break;
            default:
                $this->facing = $face;
                if ($blockReplace->getSide($face)->isSolid()) {
                    $this->attachment = self::ATTACHEMENTS[2];
                } else {
                    $this->attachment = self::ATTACHEMENTS[3];
                }
        }

        return parent::place($tx, $item, $blockReplace, $blockClicked, $face, $clickVector, $player);
    }

    public function setFacing(int $facing): self
    {
        $this->facing = $facing;
        return $this;
    }

    public function getAttachment(): string
    {
        return $this->attachment;
    }

    public function setAttachment(string $attachment): self
    {
        $this->attachment = $attachment;
        $this->attachmentInt = array_search($attachment, self::ATTACHEMENTS);
        return $this;
    }

    public function getStateDeserialize(): ?Closure
    {
        return fn(BlockStateReader $in): Grindstone => ExtraVanillaBlocks::GRINDSTONE()->setFacing($in->readLegacyHorizontalFacing())->setAttachment($in->readString(BlockStateNames::ATTACHMENT));
    }

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->horizontalFacing($this->facing);
        $w->boundedInt(2, 0, 4, $this->attachmentInt);
    }
}
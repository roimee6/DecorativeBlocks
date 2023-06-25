<?php

namespace DecorativeBlocks\block;

use Closure;
use DecorativeBlocks\utils\Metadata;
use DecorativeBlocks\utils\MultiFaceDirectionTrait;
use pocketmine\block\Block;
use pocketmine\block\Sculk;
use pocketmine\block\Vine;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;
use pocketmine\item\Item;
use pocketmine\math\Axis;
use pocketmine\math\Facing;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\BlockTransaction;

class SculkVein extends CustomState
{
    use MultiFaceDirectionTrait;

    const MULTI_FACE_DIRECTION = "multi_face_direction_bits";

    public function getStateSerialize(): ?Closure
    {
        return fn(SculkVein $block): BlockStateWriter => BlockStateWriter::create(BlockTypeNames::SCULK_VEIN)->writeInt(self::MULTI_FACE_DIRECTION, ($block->hasFace(Facing::DOWN) ? Metadata::FACING_DOWN : 0) | ($block->hasFace(Facing::UP) ? Metadata::FACING_UP : 0) | ($block->hasFace(Facing::NORTH) ? Metadata::FACING_NORTH : 0) | ($block->hasFace(Facing::SOUTH) ? Metadata::FACING_SOUTH : 0) | ($block->hasFace(Facing::WEST) ? Metadata::FACING_WEST : 0) | ($block->hasFace(Facing::EAST) ? Metadata::FACING_EAST : 0));
    }

    public function place(BlockTransaction $tx, Item $item, Block $blockReplace, Block $blockClicked, int $face, Vector3 $clickVector, ?Player $player = null): bool
    {
        $this->faces = $blockReplace instanceof SculkVein ? $blockReplace->faces : [];
        $this->faces[Facing::opposite($face)] = Facing::opposite($face);

        return parent::place($tx, $item, $blockReplace, $blockClicked, $face, $clickVector, $player);
    }

    public function getStateDeserialize(): ?Closure
    {
        return function (BlockStateReader $in): SculkVein {
            $directionFlags = $in->readBoundedInt(self::MULTI_FACE_DIRECTION, 0, 63);

            return ExtraVanillaBlocks::SCULK_VEIN()
                ->setFace(Facing::DOWN, ($directionFlags & Metadata::FACING_DOWN) !== 0)
                ->setFace(Facing::UP, ($directionFlags & Metadata::FACING_UP) !== 0)
                ->setFace(Facing::NORTH, ($directionFlags & Metadata::FACING_NORTH) !== 0)
                ->setFace(Facing::SOUTH, ($directionFlags & Metadata::FACING_SOUTH) !== 0)
                ->setFace(Facing::WEST, ($directionFlags & Metadata::FACING_WEST) !== 0)
                ->setFace(Facing::EAST, ($directionFlags & Metadata::FACING_EAST) !== 0);
        };
    }
}
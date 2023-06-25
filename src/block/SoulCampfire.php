<?php

namespace DecorativeBlocks\block;

use Closure;
use pocketmine\data\bedrock\block\BlockStateNames;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;

class SoulCampfire extends BaseCampfire
{
    public function getStateSerialize(): ?Closure
    {
        return fn(SoulCampfire $block): BlockStateWriter => BlockStateWriter::create(BlockTypeNames::SOUL_CAMPFIRE)->writeLegacyHorizontalFacing($block->getFacing())->writeBool(BlockStateNames::EXTINGUISHED, $block->isExtinguished());
    }

    public function getStateDeserialize(): ?Closure
    {
        return fn(BlockStateReader $in): SoulCampfire => ExtraVanillaBlocks::SOUL_CAMPFIRE()->setFacing($in->readLegacyHorizontalFacing())->setExtinguish($in->readBool(BlockStateNames::EXTINGUISHED));
    }
}
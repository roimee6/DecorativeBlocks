<?php

namespace DecorativeBlocks\block;

use Closure;
use pocketmine\block\utils\AnyFacingTrait;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;

class AmethystCluster extends CustomState
{
    use AnyFacingTrait;

    public function getStateSerialize(): ?Closure
    {
        return fn(AmethystCluster $block): BlockStateWriter => BlockStateWriter::create(BlockTypeNames::AMETHYST_CLUSTER)->writeFacingDirection($block->getFacing());
    }

    public function getStateDeserialize(): ?Closure
    {
        return fn(BlockStateReader $in): AmethystCluster => ExtraVanillaBlocks::AMETHYST_CLUSTER()->setFacing($in->readFacingDirection());
    }
}
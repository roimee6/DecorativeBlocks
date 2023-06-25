<?php

namespace DecorativeBlocks\block;

use Closure;
use pocketmine\data\bedrock\block\BlockStateNames;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;
use pocketmine\data\runtime\RuntimeDataDescriber;

class Composter extends CustomState
{
    private int $fill_level = 0;

    public function getStateSerialize(): ?Closure
    {
        return fn(Composter $block): BlockStateWriter => BlockStateWriter::create(BlockTypeNames::COMPOSTER)->writeInt(BlockStateNames::COMPOSTER_FILL_LEVEL, $block->fill_level);
    }

    public function getStateDeserialize(): ?Closure
    {
        return fn(BlockStateReader $in): Composter => ExtraVanillaBlocks::COMPOSTER()->setFillLevel($in->readInt(BlockStateNames::COMPOSTER_FILL_LEVEL));
    }

    public function setFillLevel(int $state): self
    {
        $this->fill_level = $state;
        return $this;
    }

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->int(4, $this->fill_level);
    }
}
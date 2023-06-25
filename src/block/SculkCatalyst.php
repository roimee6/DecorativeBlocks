<?php

namespace DecorativeBlocks\block;

use Closure;
use pocketmine\data\bedrock\block\BlockStateNames;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;
use pocketmine\data\runtime\RuntimeDataDescriber;

class SculkCatalyst extends CustomState
{
    private bool $bloom = false;

    public function getStateSerialize(): ?Closure
    {
        return fn(SculkCatalyst $block): BlockStateWriter => BlockStateWriter::create(BlockTypeNames::SCULK_CATALYST)->writeBool(BlockStateNames::BLOOM, $block->isBloom());
    }

    public function isBloom(): bool
    {
        return $this->bloom;
    }

    public function setBloom(bool $state): self
    {
        $this->bloom = $state;
        return $this;
    }

    public function getStateDeserialize(): ?Closure
    {
        return fn(BlockStateReader $in): SculkCatalyst => ExtraVanillaBlocks::SCULK_CATALYST()->setBloom($in->readBool(BlockStateNames::BLOOM));
    }

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->bool($this->bloom);
    }
}
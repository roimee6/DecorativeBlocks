<?php

namespace DecorativeBlocks\block;

use Closure;
use pocketmine\data\bedrock\block\BlockStateNames;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;
use pocketmine\data\runtime\RuntimeDataDescriber;

class SculkShrieker extends CustomState
{
    private bool $active = false;
    private bool $canSummon = false;

    public function getStateSerialize(): ?Closure
    {
        return fn(SculkShrieker $block): BlockStateWriter => BlockStateWriter::create(BlockTypeNames::SCULK_SHRIEKER)->writeBool(BlockStateNames::ACTIVE, $block->isActive())->writeBool(BlockStateNames::CAN_SUMMON, $block->canSummon());
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    public function canSummon(): bool
    {
        return $this->canSummon;
    }

    public function getStateDeserialize(): ?Closure
    {
        return fn(BlockStateReader $in): SculkShrieker => ExtraVanillaBlocks::SCULK_SHRIEKER()->setActive($in->readBool(BlockStateNames::ACTIVE))->setSummon($in->readBool(BlockStateNames::CAN_SUMMON));
    }

    public function setSummon(bool $canSummon): self
    {
        $this->canSummon = $canSummon;
        return $this;
    }

    public function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->bool($this->active);
        $w->bool($this->canSummon);
    }
}
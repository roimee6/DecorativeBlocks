<?php

namespace DecorativeBlocks\block;

use Closure;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\data\bedrock\block\convert\BlockStateReader;
use pocketmine\data\bedrock\block\convert\BlockStateWriter;
use pocketmine\data\runtime\RuntimeDataDescriber;

class SculkSensor extends CustomState
{
    private int $poweredBit = 2;
    const POWERED_BIT = "sculk_sensor_phase";

    public function getStateSerialize(): ?Closure
    {
        return fn(SculkSensor $block): BlockStateWriter => BlockStateWriter::create(BlockTypeNames::SCULK_SENSOR)->writeInt(self::POWERED_BIT, $block->isPoweredBit());
    }

    public function isPoweredBit(): int
    {
        return $this->poweredBit;
    }

    public function setPoweredBit(int $state): self
    {
        $this->poweredBit = $state;
        return $this;
    }

    public function getStateDeserialize(): ?Closure
    {
        return fn(BlockStateReader $in): SculkSensor => ExtraVanillaBlocks::SCULK_SENSOR()->setPoweredBit($in->readInt(self::POWERED_BIT));
    }

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->boundedInt(2, 0, 4, $this->poweredBit);
    }
}
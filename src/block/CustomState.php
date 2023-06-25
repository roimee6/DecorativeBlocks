<?php

namespace DecorativeBlocks\block;

use Closure;
use pocketmine\block\Opaque;

abstract class CustomState extends Opaque
{
    abstract public function getStateSerialize(): ?Closure;

    abstract public function getStateDeserialize(): ?Closure;
}

<?php

namespace DecorativeBlocks\utils;

use InvalidArgumentException;
use pocketmine\data\runtime\RuntimeDataDescriber;
use pocketmine\math\Facing;

trait MultiFaceDirectionTrait
{
    protected array $faces = [];

    protected function describeBlockOnlyState(RuntimeDataDescriber $w): void
    {
        $w->horizontalFacingFlags($this->faces);
    }

    public function getFaces(): array
    {
        return $this->faces;
    }

    public function hasFace(int $face): bool
    {
        return isset($this->faces[$face]);
    }

    public function setFaces(array $faces, bool $strict = false): self
    {
        $uniqueFaces = [];

        foreach ($faces as $face) {
            if ($strict && ($face !== Facing::NORTH && $face !== Facing::SOUTH && $face !== Facing::WEST && $face !== Facing::EAST)) {
                throw new InvalidArgumentException("Facing can only be north, east, south or west");
            }
            $uniqueFaces[$face] = $face;
        }

        $this->faces = $uniqueFaces;
        return $this;
    }

    public function setFace(int $face, bool $value, bool $strict = false): self
    {
        if ($strict && ($face !== Facing::NORTH && $face !== Facing::SOUTH && $face !== Facing::WEST && $face !== Facing::EAST)) {
            throw new InvalidArgumentException("Facing can only be north, east, south or west");
        }

        if ($value) {
            $this->faces[$face] = $face;
        } else {
            unset($this->faces[$face]);
        }

        return $this;
    }
}
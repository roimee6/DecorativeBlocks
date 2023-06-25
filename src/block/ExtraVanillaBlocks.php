<?php

namespace DecorativeBlocks\block;

use pocketmine\block\Block;
use pocketmine\block\BlockBreakInfo;
use pocketmine\block\BlockIdentifier;
use pocketmine\block\BlockTypeIds;
use pocketmine\block\BlockTypeInfo;
use pocketmine\block\Opaque;
use pocketmine\utils\CloningRegistryTrait;

/**
 * @method static Opaque ALLOW()
 * @method static Opaque AZALEA()
 * @method static Opaque BAMBOO_FENCE()
 * @method static Opaque BAMBOO_MOSAIC()
 * @method static Opaque BAMBOO_PLANKS()
 * @method static Opaque BUDDING_AMETHYST()
 * @method static Opaque CAMERA()
 * @method static Opaque CHERRY_FENCE()
 * @method static Opaque CHERRY_PLANKS()
 * @method static Opaque CONDUIT()
 * @method static Opaque CRIMSON_FUNGUS()
 * @method static Opaque CRIMSON_NYLIUM()
 * @method static Opaque CRIMSON_ROOTS()
 * @method static Opaque DENY()
 * @method static Opaque DRIPSTONE_BLOCK()
 * @method static Opaque END_GATEWAY()
 * @method static Opaque END_PORTAL()
 * @method static Opaque FLOWERING_AZALEA()
 * @method static Opaque FROG_SPAWN()
 * @method static Opaque HONEY_BLOCK()
 * @method static Opaque LODESTONE()
 * @method static Opaque MOSS_BLOCK()
 * @method static Opaque MOSS_CARPET()
 * @method static Opaque NETHER_SPROUTS()
 * @method static Opaque POWDER_SNOW()
 * @method static Opaque TARGET()
 * @method static Opaque TORCHFLOWER()
 * @method static Opaque UNKNOWN()
 * @method static Opaque WARPED_FUNGUS()
 * @method static Opaque WARPED_NYLIUM()
 * @method static Opaque WARPED_ROOTS()
 *
 * @method static Campfire CAMPFIRE()
 * @method static SoulCampfire SOUL_CAMPFIRE()
 * @method static Grindstone GRINDSTONE()
 * @method static Composter COMPOSTER()
 * @method static SculkShrieker SCULK_SHRIEKER()
 * @method static SculkSensor SCULK_SENSOR()
 * @method static SculkCatalyst SCULK_CATALYST()
 * @method static SculkVein SCULK_VEIN()
 * @method static AmethystCluster AMETHYST_CLUSTER()
 */
final class ExtraVanillaBlocks
{
    use CloningRegistryTrait;

    private function __construct()
    {
    }

    /**
     * @return Block[]
     * @phpstan-return array<string, Block>
     */
    public static function getAll(): array
    {
        /** @var Block[] $result */
        $result = self::_registryGetAll();
        return $result;
    }

    protected static function setup(): void
    {
        self::register("allow", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Allow", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("azalea", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Azalea", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("bamboo_fence", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Bamboo Fence", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("bamboo_mosaic", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Bamboo Mosaic", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("bamboo_planks", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Bamboo Planks", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("budding_amethyst", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Budding Amethyst", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("camera", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Camera", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("cherry_fence", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Cherry Fence", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("cherry_planks", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Cherry Planks", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("conduit", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Conduit", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("crimson_fungus", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Crimson Fungus", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("crimson_nylium", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Crimson Nylium", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("crimson_roots", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Crimson Roots", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("deny", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Deny", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("dripstone_block", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Dripstone Block", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("end_gateway", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "End Gateway", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("end_portal", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "End Portal", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("flowering_azalea", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Flowering Azalea", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("frog_spawn", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Frog Spawn", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("honey_block", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Honey Block", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("lodestone", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Lodestone", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("moss_block", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Moss Block", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("moss_carpet", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Moss Carpet", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("nether_sprouts", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Nether Sprouts", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("powder_snow", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Powder Snow", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("target", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Target", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("torchflower", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Torchflower", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("unknown", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Unknown", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("warped_fungus", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Warped Fungus", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("warped_nylium", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Warped Nylium", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("warped_roots", new Opaque(new BlockIdentifier(BlockTypeIds::newId()), "Warped Roots", new BlockTypeInfo(BlockBreakInfo::instant())));

        self::register("campfire", new Campfire(new BlockIdentifier(BlockTypeIds::newId()), "Campfire", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("soul_campfire", new SoulCampfire(new BlockIdentifier(BlockTypeIds::newId()), "Soul Campfire", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("grindstone", new Grindstone(new BlockIdentifier(BlockTypeIds::newId()), "Grindstone", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("composter", new Composter(new BlockIdentifier(BlockTypeIds::newId()), "Composter", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("sculk_shrieker", new SculkShrieker(new BlockIdentifier(BlockTypeIds::newId()), "Sculk Shrieker", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("sculk_sensor", new SculkSensor(new BlockIdentifier(BlockTypeIds::newId()), "Sculk Sensor", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("sculk_catalyst", new SculkCatalyst(new BlockIdentifier(BlockTypeIds::newId()), "Sculk Catalyst", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("sculk_vein", new SculkVein(new BlockIdentifier(BlockTypeIds::newId()), "Sculk Vein", new BlockTypeInfo(BlockBreakInfo::instant())));
        self::register("amethyst_cluster", new AmethystCluster(new BlockIdentifier(BlockTypeIds::newId()), "Amethyst Cluster", new BlockTypeInfo(BlockBreakInfo::instant())));
    }

    protected static function register(string $name, Block $block): void
    {
        self::_registryRegister($name, $block);
    }
}
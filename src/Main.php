<?php /** @noinspection PhpUnused */

namespace DecorativeBlocks;

use pocketmine\block\Block;
use pocketmine\block\RuntimeBlockStateRegistry;
use pocketmine\data\bedrock\block\BlockTypeNames;
use pocketmine\inventory\CreativeInventory;
use pocketmine\item\StringToItemParser;
use pocketmine\network\mcpe\convert\TypeConverter;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\AsyncTask;
use pocketmine\world\format\io\GlobalBlockStateHandlers;
use DecorativeBlocks\block\CustomState;
use DecorativeBlocks\block\ExtraVanillaBlocks;

final class Main extends PluginBase
{
    public function onEnable(): void
    {
        self::registerBlocks();

        foreach (TypeConverter::getInstance()->getBlockTranslator()->getBlockStateDictionary()->getStates() as $state) {
            if (str_contains($state->getStateName(), "sculk_vein")) {
                var_dump($state->generateStateData()->getStates());
            }
        }

        foreach (CreativeInventory::getInstance()->getAll() as $item) {
            TypeConverter::getInstance()->coreItemStackToNet($item);
        }

        $this->getServer()->getAsyncPool()->addWorkerStartHook(function (int $worker): void {
            $this->getServer()->getAsyncPool()->submitTaskToWorker(new class extends AsyncTask {
                public function onRun(): void
                {
                    Main::registerBlocks();
                }
            }, $worker);
        });
    }

    public static function registerBlocks(): void
    {
        $allow = ExtraVanillaBlocks::ALLOW();
        $azalea = ExtraVanillaBlocks::AZALEA();
        $bambooFence = ExtraVanillaBlocks::BAMBOO_FENCE();
        $bambooMosaic = ExtraVanillaBlocks::BAMBOO_MOSAIC();
        $bambooPlanks = ExtraVanillaBlocks::BAMBOO_PLANKS();
        $buddingAmethyst = ExtraVanillaBlocks::BUDDING_AMETHYST();
        $camera = ExtraVanillaBlocks::CAMERA();
        $cherryFence = ExtraVanillaBlocks::CHERRY_FENCE();
        $cherryPlanks = ExtraVanillaBlocks::CHERRY_PLANKS();
        $conduit = ExtraVanillaBlocks::CONDUIT();
        $crimsonFungus = ExtraVanillaBlocks::CRIMSON_FUNGUS();
        $crimsonNylium = ExtraVanillaBlocks::CRIMSON_NYLIUM();
        $crimsonRoots = ExtraVanillaBlocks::CRIMSON_ROOTS();
        $deny = ExtraVanillaBlocks::DENY();
        $dripstoneBlock = ExtraVanillaBlocks::DRIPSTONE_BLOCK();
        $endGateway = ExtraVanillaBlocks::END_GATEWAY();
        $endPortal = ExtraVanillaBlocks::END_PORTAL();
        $floweringAzalea = ExtraVanillaBlocks::FLOWERING_AZALEA();
        $frogSpawn = ExtraVanillaBlocks::FROG_SPAWN();
        $honeyBlock = ExtraVanillaBlocks::HONEY_BLOCK();
        $lodestone = ExtraVanillaBlocks::LODESTONE();
        $mossBlock = ExtraVanillaBlocks::MOSS_BLOCK();
        $mossCarpet = ExtraVanillaBlocks::MOSS_CARPET();
        $netherSprouts = ExtraVanillaBlocks::NETHER_SPROUTS();
        $powderSnow = ExtraVanillaBlocks::POWDER_SNOW();
        $target = ExtraVanillaBlocks::TARGET();
        $torchFlower = ExtraVanillaBlocks::TORCHFLOWER();
        $unknown = ExtraVanillaBlocks::UNKNOWN();
        $warpedFungus = ExtraVanillaBlocks::WARPED_FUNGUS();
        $warpedNylium = ExtraVanillaBlocks::WARPED_NYLIUM();
        $warpedRoots = ExtraVanillaBlocks::WARPED_ROOTS();
        $campfire = ExtraVanillaBlocks::CAMPFIRE();
        $soulCampfire = ExtraVanillaBlocks::SOUL_CAMPFIRE();
        $grindstone = ExtraVanillaBlocks::GRINDSTONE();
        $composter = ExtraVanillaBlocks::COMPOSTER();
        $sculkShrieker = ExtraVanillaBlocks::SCULK_SHRIEKER();
        $sculkSensor = ExtraVanillaBlocks::SCULK_SENSOR();
        $sculkCatalyst = ExtraVanillaBlocks::SCULK_CATALYST();
        $sculkVein = ExtraVanillaBlocks::SCULK_VEIN();
        $amethyseCluster = ExtraVanillaBlocks::AMETHYST_CLUSTER();

        self::registerBlock(BlockTypeNames::ALLOW, $allow, ["allow"]);
        self::registerBlock(BlockTypeNames::AZALEA, $azalea, ["azalea"]);
        self::registerBlock(BlockTypeNames::BAMBOO_FENCE, $bambooFence, ["bamboo_fence"]);
        self::registerBlock(BlockTypeNames::BAMBOO_MOSAIC, $bambooMosaic, ["bamboo_mosaic"]);
        self::registerBlock(BlockTypeNames::BAMBOO_PLANKS, $bambooPlanks, ["bamboo_planks"]);
        self::registerBlock(BlockTypeNames::BUDDING_AMETHYST, $buddingAmethyst, ["budding_amethyst"]);
        self::registerBlock(BlockTypeNames::CAMERA, $camera, ["camera"]);
        self::registerBlock(BlockTypeNames::CHERRY_FENCE, $cherryFence, ["cherry_fence"]);
        self::registerBlock(BlockTypeNames::CHERRY_PLANKS, $cherryPlanks, ["cherry_planks"]);
        self::registerBlock(BlockTypeNames::CONDUIT, $conduit, ["conduit"]);
        self::registerBlock(BlockTypeNames::CRIMSON_FUNGUS, $crimsonFungus, ["crimson_fungus"]);
        self::registerBlock(BlockTypeNames::CRIMSON_NYLIUM, $crimsonNylium, ["crimson_nylium"]);
        self::registerBlock(BlockTypeNames::CRIMSON_ROOTS, $crimsonRoots, ["crimson_roots"]);
        self::registerBlock(BlockTypeNames::DENY, $deny, ["deny"]);
        self::registerBlock(BlockTypeNames::DRIPSTONE_BLOCK, $dripstoneBlock, ["dripstone_block"]);
        self::registerBlock(BlockTypeNames::END_GATEWAY, $endGateway, ["end_gateway"]);
        self::registerBlock(BlockTypeNames::END_PORTAL, $endPortal, ["end_portal"]);
        self::registerBlock(BlockTypeNames::FLOWERING_AZALEA, $floweringAzalea, ["flowering_azalea"]);
        self::registerBlock(BlockTypeNames::FROG_SPAWN, $frogSpawn, ["frog_spawn"]);
        self::registerBlock(BlockTypeNames::HONEY_BLOCK, $honeyBlock, ["honey_block"]);
        self::registerBlock(BlockTypeNames::LODESTONE, $lodestone, ["lodestone"]);
        self::registerBlock(BlockTypeNames::MOSS_BLOCK, $mossBlock, ["moss_block"]);
        self::registerBlock(BlockTypeNames::MOSS_CARPET, $mossCarpet, ["moss_carpet"]);
        self::registerBlock(BlockTypeNames::NETHER_SPROUTS, $netherSprouts, ["nether_sprouts"]);
        self::registerBlock(BlockTypeNames::POWDER_SNOW, $powderSnow, ["powder_snow"]);
        self::registerBlock(BlockTypeNames::TARGET, $target, ["target"]);
        self::registerBlock(BlockTypeNames::TORCHFLOWER, $torchFlower, ["torchflower"]);
        self::registerBlock(BlockTypeNames::UNKNOWN, $unknown, ["unknown"]);
        self::registerBlock(BlockTypeNames::WARPED_FUNGUS, $warpedFungus, ["warped_fungus"]);
        self::registerBlock(BlockTypeNames::WARPED_NYLIUM, $warpedNylium, ["warped_nylium"]);
        self::registerBlock(BlockTypeNames::WARPED_ROOTS, $warpedRoots, ["warped_roots"]);

        self::registerBlock(BlockTypeNames::CAMPFIRE, $campfire, ["campfire"]);
        self::registerBlock(BlockTypeNames::SOUL_CAMPFIRE, $soulCampfire, ["soul_campfire"]);
        self::registerBlock(BlockTypeNames::GRINDSTONE, $grindstone, ["grindstone"]);
        self::registerBlock(BlockTypeNames::COMPOSTER, $composter, ["composter"]);
        self::registerBlock(BlockTypeNames::SCULK_SHRIEKER, $sculkShrieker, ["sculk_shrienker"]);
        self::registerBlock(BlockTypeNames::SCULK_SENSOR, $sculkSensor, ["sculk_sensor"]);
        self::registerBlock(BlockTypeNames::SCULK_CATALYST, $sculkCatalyst, ["sculk_catalyst"]);
        self::registerBlock(BlockTypeNames::SCULK_VEIN, $sculkVein, ["sculk_vein"]);
        self::registerBlock(BlockTypeNames::AMETHYST_CLUSTER, $amethyseCluster, ["amethyst_cluster"]);
    }

    /**
     * @param string[] $stringToItemParserNames
     */
    private static function registerBlock(string $id, Block $block, array $stringToItemParserNames): void
    {
        RuntimeBlockStateRegistry::getInstance()->register($block);

        if ($block instanceof CustomState) {
            GlobalBlockStateHandlers::getDeserializer()->map($id, $block->getStateDeserialize());
            GlobalBlockStateHandlers::getSerializer()->map($block, $block->getStateSerialize());
        } else {
            GlobalBlockStateHandlers::getDeserializer()->mapSimple($id, fn() => clone $block);
            GlobalBlockStateHandlers::getSerializer()->mapSimple($block, $id);
        }

        foreach ($stringToItemParserNames as $name) {
            StringToItemParser::getInstance()->registerBlock($name, fn() => clone $block);
        }

        CreativeInventory::getInstance()->add($block->asItem());
    }
}
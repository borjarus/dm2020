<?php

declare(strict_types=1);

namespace App\Repository\Domain;

class Terrain
{
    const GRASSLANDS = 'grasslands';
    const MOUNTAINS = 'mountains';
    const RAINFORESTS = 'rainforests';
    const TUNDRA = 'tundra';
    const ICE_CAVES = 'ice caves';
    const JUNGLES = 'jungles';
    const GAS_GIANT = 'gas giant';
    const FORESTS = 'forests';
    const LAKES = 'lakes';
    const GRASSY_HILLS = 'grassy hills';
    const SWAMPS = 'swamps';
    const CITYSCAPE = 'cityscape';
    const OCEAN = 'ocean';
    const ROCK = 'rock';
    const DESERT = 'desert';
    const BARREN = 'barren';
    const UNDEFINED = 'undefined';


    public static function fromString(string $input)
    {
        $outputArray = [];
        $explodedString = explode(',', $input);
        if (count($explodedString) > 0){
            foreach($explodedString as $str){
                $outputArray[] = self::parseString(trim($str));
            }
        }
        return $outputArray;
    }

    private static function parseString(string $input){
        switch($input){
            case 'grasslands': return self::GRASSLANDS;
            case 'rainforests': return self::RAINFORESTS;
            case 'forests': return self::FORESTS;
            case 'tundra': return self::TUNDRA;
            case 'ice caves':  return self::ICE_CAVES;
            case 'mountain': 
            case 'mountain ranges': 
            case 'mountains': return self::MOUNTAINS; 
            case 'swamp':
            case 'swamps': return self::SWAMPS;
            case 'jungle':
            case 'jungles': return self::JUNGLES;
            case 'gas giant': return self::GAS_GIANT;
            case 'cityscape': return self::CITYSCAPE;
            case 'ocean': return self::OCEAN;
            case 'rock': return self::ROCK;
            case 'lakes': return self::LAKES;
            case 'barren': return self::BARREN;
            case 'grassy hills': return self::GRASSY_HILLS;
            case 'desert': return self::DESERT;
            default: return self::UNDEFINED;
        }
    }
}

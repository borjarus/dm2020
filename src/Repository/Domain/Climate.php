<?php

declare(strict_types=1);

namespace App\Repository\Domain;

class Climate
{
    const TEMPERATE = 'temperate';
    const TROPICAL = 'tropical';
    const FROZEN = 'frozen';
    const MURKY = 'murky';
    const ARID = 'arid';
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
            case 'temperate': return self::TEMPERATE;
            case 'tropical': return self::TROPICAL;
            case 'frozen': return self::FROZEN;
            case 'murky': return self::MURKY;
            case 'arid': return self::ARID;
            default: 
            return self::UNDEFINED;
        }
    }
}

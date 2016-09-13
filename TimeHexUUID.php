<?php
/**
 * User: mitchlusas
 * Date: 11/16/15
 * Time: 1:07 PM
 */

class TimeHexUUID
{

    /**
    * Array of Characters for Randomizer 
    *
    */
    private static $characters = [
        'a', 'b', 'c', 'd', 'e',
        'f', '0', '1', '2', '3',
        '4', '5', '6', '7', '8',
        '9'
    ];
    
    /**
     * Creates a random character string based on the number of characters and returns the string
     *
     * @param int $numOfCharacters
     *
     * @return string
     */
    private static function createRandomCharacterString(int $numOfCharacters){
        $randomString = '';
        $charactersCount = count(self::$characters);
        for($i = 0; $i < $numOfCharacters; $i++){
            $randomString .= self::$characters[mt_rand(0, $charactersCount)];
        }

        return $randomString;
    }

    /**
     * Create a UUID with epoch unix timestamp + random hex characters
     *
     * @param bool $return_string
     *
     * @return string
     */
    public static function createUUID(bool $return_string = false){

        $serverID = "a";

        $microTime = sprintf('%.4f', microtime(true))*10000; // 0987654321.12345 (10 + 5 = 15 digits)

        $uuid = $microTime;
        $uuid .= self::createRandomCharacterString(16);
        $uuid = $uuid.$serverID;

        switch(true){
            case $return_string == true:
                //Return 32 HEX
                return $uuid;
                break;
            case $return_string == false:
                //Return 16 Binary
                return hex2bin($uuid);
                break;
            default:
                //Return 16 Binary
                return hex2bin($uuid);
                break;
        }
    }

    /**
     * Check the object->id to see if the id is set.  If not, create a UUID for object->id.  Return the object.
     *
     * @param $object
     *
     * @return mixed
     */
    public static function checkId($object){
        if(!isset($object->id)){
            $object->id = UUID::createUUID(false);
        }
        return $object;
    }
}
<?php

namespace application\Model;

/**
 * Class CharacterModel
 *
 * Class that defines a Movie Character.
 * @package application\Model
 */

class CharacterModel extends AbstractModel {

    /**
     * @var name Then name of the character
     */
    private $name;

    /**
     * @var runtime The runtime in minutes
     */
    private $runtime;

    /**
     * @var releaseDate The release date of the movie
     */
    private $releaseDate;

    /**
     * Creates a new object from a data array
     *
     * @param $data The array containing the object info
     * @throws Exception Throws an exception if the property does not exist
     */
    public function __construct($data) {

        if( $this->validateCharacter($data) ) {
            parent::__construct($data);
        } else {
            throw new Exception("Character data not valid.");
        }

    }

    /**
     * Validates the character data
     *
     * @param $data The array containing the object info
     * @return bool Validation result
     */
    private function validateCharacter($data) {

        foreach( $data as $key=>$value ) {
            switch( $key ) {

                case "name" :
                    if( !is_string($value) ) {
                        return false;
                    }
                    break;

                default:
                    break;

            }
        }

        //everything is valid
        return true;
    }

}
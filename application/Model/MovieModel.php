<?php

namespace application\Model;

/**
 * Class AbstractModel
 *
 * Class that defines an abstract model for any kind of object to be used.
 * @package application\Model
 */

class MovieModel extends AbstractModel {

    /**
     * @var title Then title of the movie
     */
    private $title;

    /**
     * @var runtime The runtime in minutes
     */
    private $runtime;

    /**
     * @var releaseDate The release date of the movie
     */
    private $releaseDate;

    /**
     * @var cast Array containing a collection of actors and their respective role
     */
    private $cast;

    /**
     * Creates a new object from a data array
     *
     * @param $data The array containing the object info
     * @throws Exception Throws an exception if the property does not exist
     */
    public function __construct($data) {

        if( $this->validateMovie($data) ) {
            parent::__construct($data);
        } else {
            throw new Exception("Movie data not valid.");
        }

    }

    /**
     * Validates the movie data
     *
     * @param $data The array containing the object info
     * @return bool Validation result
     */
    private function validateMovie($data) {

        foreach( $data as $key=>$value ) {
            switch( $key ) {

                case "title" :
                    if( !is_string($value) ) {
                        return false;
                    }
                    break;

                case "runtime":
                    if( !is_int($value) ) {
                        return false;
                    }
                    break;

                case "releaseDate":
                    if( !strtotime($value) ) {
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

    /**
     * Adds a new actor/character object to the cast
     *
     * @param ActorModel $actor
     * @param CharacterModel $character
     */
    public function addCast(ActorModel $actor, CharacterModel $character) {

        $this->cast[] = array($actor, $character);

    }

    /**
     * @return cast
     */
    public function getCast() {
        return $this->cast;
    }

}
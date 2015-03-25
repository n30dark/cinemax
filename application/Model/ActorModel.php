<?php

namespace application\Model;

/**
 * Class ActorModel
 *
 * Class that defines an actor model.
 * @package application\Model
 */

class ActorModel extends AbstractModel {

    /**
     * @var name The name of the actor
     */
    private $name;

    /**
     * @var birthDate The birth date of the actor
     */
    private $birthDate;

    /**
     * Creates a new actor from a data array
     *
     * @param $data The array containing the object info
     * @throws Exception Throws an exception if the property does not exist
     */
    public function __construct($data) {

        if( $this->validateActor($data) ) {
            parent::__construct($data);
        } else {
            throw new Exception("Actor data not valid.");
        }

    }

    /**
     * Validates the actor data
     *
     * @param $data The array containing the object info
     * @return bool Validation result
     */
    private function validateActor($data) {

        foreach( $data as $key=>$value ) {
            switch( $key ) {

                case "name" :
                    if( !is_string($value) ) {
                        return false;
                    }
                    break;

                case "birthDate":
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

    public function getAge() {
        $now      = new DateTime();
        $birthday = new DateTime($this->birthDate);
        $interval = $now->diff($birthday);
        return $interval->format('%y');
    }

}
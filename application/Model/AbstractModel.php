<?php

namespace application\Model;

/**
 * Class AbstractModel
 *
 * Class that defines an abstract model for any kind of object to be used.
 */

class AbstractModel {

    /**
     * @var id The id of the object
     */
    protected $id;

    /**
     * Creates a new object from a data array
     *
     * @param $data The array containing the object info
     * @throws Exception Throws an exception if the property does not exist
     */
    public function __construct($data) {

        foreach($data as $key=>$value) {

            if(!isset($this->{$key})) {
                throw new Exception("Not a valid variable for this object.");
            } else {
                $this->{$key} = $value;
            }
        }

    }

    /**
     * Sets an object property to a given value
     *
     * @param $key The property to be modified
     * @param $value The value to be added
     * @throws Exception Throws an exception if the property does not exist
     */
    public function set($key, $value) {

        if(!isset($this->{$key})) {
            throw new Exception("Not a valid variable for this object.");
        } else {
            $this->{$key} = $value;
        }

    }

    /**
     * Fetches the value of an object property
     *
     * @param $key The property to be fetch
     * @return mixed The value of that property
     * @throws Exception Throws an exception if the property does not exist
     */
    public function get($key) {

        if(!isset($this->{$key})) {
            throw new Exception("Not a valid variable for this object.");
        } else {
            return $this->{$key};
        }

    }

}
<?php

namespace application\Service;

/**
 * Class AbstractService
 * @package application\Service
 */
class MovieService extends AbstractService {

    /**
     * @var
     */
    protected $_model;

    /**
     * @param $title
     * @param $runtime
     * @param $releaseDate
     */
    public function create($title, $runtime, $releaseDate) {

        $data = array(
            "title" => $title,
            "runtime" => $runtime,
            "releaseDate" => $releaseDate
        );

        $this->_model = new MovieModel($data);
    }

    /**
     * @param array $actors
     * @param array $characters
     */
    public function addCast(array $actors, array $characters) {

        $i = 0;
        foreach($actors as $actor) {
            $this->_model->addCast($actor, $characters[$i]);
            $i++;
        }

    }

    /**
     * @return string
     */
    public function getActorsByAge() {

        $cast = $this->model->getCast();

        $actors = $cast[0];

        $this->_return = array();

        foreach($actors as $actor) {
            $this->_return[] = array("age" => $actor->getAge(), "actor" => $actor);
        }

        arsort($this->_return);
        return $this->jsonOutput();

    }

}
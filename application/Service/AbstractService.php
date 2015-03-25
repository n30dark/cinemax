<?php

namespace application\Service;

/**
 * Class AbstractService
 * @package application\Service
 */
class AbstractService {

    /**
     * @var
     */
    protected $_return;

    /**
     * @return string
     */
    public function jsonOutput() {

        return json_encode($this->_return);

    }

}

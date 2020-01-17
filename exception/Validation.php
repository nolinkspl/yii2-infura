<?php

namespace app\exception;

class Validation extends \Exception {

    /** @var array */
    private $_errors;

    /**
     * Validation constructor.
     * @param array $errors
     */
    public function __construct(array $errors) {
        $this->_errors = $errors;
        parent::__construct();
    }

    /**
     * @return array
     */
    public function errors() {
        return $this->_errors;
    }
}
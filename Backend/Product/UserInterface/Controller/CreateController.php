<?php

namespace Backend\Product\UserInterface\Controller;

class CreateController
{

    public function __construct() {
        $this->__invoke();
    }

    public function __invoke()
    {
        require_once("../../../../Frontend/Product/create.php");
    }
}

new CreateController();
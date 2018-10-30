<?php
require($_SERVER['DOCUMENT_ROOT'] . '/pos/smarty/Smarty.class.php');

class C_principal extends Smarty
{

    function __construct()
    {
        parent::__construct();
        
        require($_SERVER['DOCUMENT_ROOT'] . '/pos/config/config.php');

        $this->setTemplateDir($config['base_url'] . '/smarty/templates');
        $this->setCompileDir($config['base_url'] . '/smarty/templates_c');
    }


}
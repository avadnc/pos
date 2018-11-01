<?php
// require($_SERVER['DOCUMENT_ROOT'] . '/pos/smarty/Smarty.class.php');
require($_SERVER['DOCUMENT_ROOT'] . '/pos/smarty/SmartyBC.class.php');

class C_principal extends SmartyBC
{

    function __construct()
    {
        parent::__construct();

        require($_SERVER['DOCUMENT_ROOT'] . '/pos/config/config.php');

        $this->setTemplateDir($config['base_url'] . '/smarty/templates');
        $this->setCompileDir($config['base_url'] . '/smarty/templates_c');
    }

    public function salir()
    {

        session_destroy();
        echo '<script>
   alert("hola");
    </script>';
    }

}
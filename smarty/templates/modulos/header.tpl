<!-- Site wrapper -->
<div class="wrapper">

<header class="main-header">
    <!-- =================================================================== -->
    <!-- Logotipo                                                            -->
    <!-- =================================================================== -->
    <a class="logo">

        <!-- Logo Mini -->

        <span class="logo-mini">
            <img src="img/cash.png" class="img-responsive" style="padding: 10px;">

        </span>

        <!-- Logo Normal-->

        <span class="logo-lg">
            <b>Punto de Venta </b>POS
        </span>

    </a>

    <!-- =================================================================== -->
    <!-- Barra de navegación                                                 -->
    <!-- =================================================================== -->

    <nav class="navbar navbar-static-top" role="navigation">

        <!--Botón de navegación-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle Navigation</span>
        </a>

        <!--Perfil de Usuario-->

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        {if $foto eq ""}
                        <img src="img/anonimo.jpg" class="user-image">
                        {else}
                        <img src="{$foto}" class="user-image">
                        {/if}
                        <span class="hidden-xs">{$nombre}</span>
                    </a>
                    <!--Dropdown toggle-->
                    <ul class="dropdown-menu">
                        <li class="user-body text-center">
                       
                        {if $perfil eq "Administrador"}
                            <h2><span class="label label-success">{$perfil}</span></h2>
                        {else if $perfil eq "Especial"}
                           <h2> <span class="label label-primary">{$perfil}</span></h2>
                        {else}
                            <h2><span class="label label-default pull-right">{$perfil}</span></h2>
                        {/if}
                        </li>
                             <li class="user-footer">
                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Salir</a>
                            </div>
                            </li>
                        
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
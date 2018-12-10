<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Menu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('site/index') ?>">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrador
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                            <?php if ($this->session->logged_in == TRUE && $this->session->user['categoria'] == 'A') { ?>
                            <a class="dropdown-item" href="<?= base_url('empleado/form') ?>">Agregar empleado</a>
                        </div>
                        <?php } ?>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Muestras
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php if ($this->session->logged_in == TRUE && $this->session->user['tipo'] == 'empresa' || $this->session->user['tipo'] == 'particular') { ?>
                            <a href="<?= base_url(); ?>resultado/resultadoMuestra/<?= $this->session->user['rut']; ?>">Ver resultado análisis</a>
                            <?php } ?>
                            <?php if ($this->session->logged_in == TRUE && $this->session->user['categoria'] == 'R') { ?>
                                <a class="dropdown-item" href="<?= base_url('muestra/formRecepcion') ?>">Recepción de muestras</a>
                            <?php } ?>
                            <?php if ($this->session->logged_in == TRUE && $this->session->user['categoria'] == 'T') { ?>
                            <a class="dropdown-item" href="<?= base_url('resultado/listar') ?>">Análizar muestras</a>
                            <?php } ?>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuarios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url('particular/form') ?>">Nuevo particular</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>particular/modificarParticular/<?= 6; ?>">Modificar particular</a>
                            <a class="dropdown-item" href="<?= base_url('empresa/form') ?>">Nueva empresa</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>empresa/modificarEmpresa/<?= 7; ?>">Modificar empresa</a>
                            <a class="dropdown-item" href="<?= base_url(); ?>empleado/modificarEmpleado/<?= $this->session->user['rut']; ?>">Modificar empleado</a>
                            <?php if ($this->session->logged_in == FALSE) { ?>
                                <a class="dropdown-item" href="<?= base_url('usuario/form/login') ?>">Iniciar Sesión</a>
                            <?php } else { ?>
                                <a class="dropdown-item" href="<?= base_url('usuario/logout') ?>">Cerrar Sesión</a>
                            <?php } ?>
                        </div>
                    </li>


                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <?php if ($this->session->logged_in == FALSE) { ?>
                               <h5> Sin login</h5>
                            <?php } else { ?>
                                <h5>Logeado como <?= $this->session->user['nombre'] ?></h5>
                            <?php } ?>
                </form>
            </div>
        </nav>
    </div>
</div>
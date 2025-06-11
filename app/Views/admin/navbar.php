<!-- Inicio de la barra de navegacion -->
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url('/') ?>">KicksUp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo base_url('admin') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('admin/productos') ?>">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('admin/usuarios') ?>">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/categorias') ?>">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/marcas') ?>">Marcas</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('admin/consultas') ?>">Consultas</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/ventas') ?>">Ventas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo base_url('/registro') ?>">Hola <?php echo session()->get('UsuarioNombre') ?></a></li>
                            <!-- <li><a class="dropdown-item" href="#">Nuetra misión</a></li> -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url('/logout') ?>">Cerrar sesión</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/registro') ?>">Registrarse</a>
                    </li> -->
                </ul>
                <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo base_url('/registro') ?>">Registrarse</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Nuetra misión</a></li> -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url('/login') ?>">Iniciar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fin de la barra de navegacion -->
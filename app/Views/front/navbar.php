<!-- Inicio de la barra de navegacion -->
<nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo base_url('/') ?>">KicksUp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('/') ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/tienda') ?>">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/comercializacion') ?>">Comercialización</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Nosotros
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('/nosotros') ?>">Quiénes somos</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Nuetra misión</a></li> -->
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/contacto') ?>">Contáctanos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (session()->get('logged_in')): ?>
                            <li><a class="dropdown-item" href="<?php echo base_url('/registro') ?>">Hola
                                    <?php echo session()->get('UsuarioNombre') ?></a></li>
                            <!-- <li><a class="dropdown-item" href="#">Nuetra misión</a></li> -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url('/logout') ?>">Cerrar sesión</a></li>
                        <?php else: ?>
                            <li><a class="dropdown-item" href="<?php echo base_url('/registro') ?>">Registrarse</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Nuetra misión</a></li> -->
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?php echo base_url('/login') ?>">Iniciar sesión</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/registro') ?>">Registrarse</a>
                    </li> -->
            </ul>
            <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" href="<?php echo base_url('/producto') ?>">Buscar</button>
                </form> -->
            <!-- <form class="d-flex" role="search" action="<?php echo base_url('/producto') ?>" method="get">
                    <input class="form-control me-2" type="search" name="buscar" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form> -->
            <span><i class="bi bi-cart" style="color: white;"></i></span>
            <?php if (isset($cart)): ?>
                <?php echo $cart->total_items(); ?>
            <?php else: ?>

            <?php endif; ?>
        </div>
    </div>
</nav>
<!-- Fin de la barra de navegacion -->

<!-- <nav>
      <ul>
        <li><a href="<?php echo base_url('/') ?>">Home</a></li>
        <li><a href="<?php echo base_url('/comercializacion') ?>">Comercializacion</a></li>
        <li><a href="<?php echo base_url('/nosotros') ?>">Quienes Somos</a></li>
        <li><a href="<?php echo base_url('/contacto') ?>">Contacto</a></li>
        <li><a href="<?php echo base_url('/terminos') ?>">Terminos y Uso</a></li>
      </ul>
    </nav> -->
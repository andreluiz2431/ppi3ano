<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../creative/index.php#page-top">FarPhysic</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="../creative/index.php#about">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="../creative/index.php#portfolio">Circuitos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="../creative/index.php#services">Calculadoras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="../creative/index.php#contact">Fórum</a>
                </li>
                <li class="nav-item">
                    <?php
                    session_start();
                    if(empty($_SESSION['usuario'])){
                        echo '<a class="nav-link js-scroll-trigger" href="../sb-admin-2/index.php">Login</a>';
                    }else{
                        echo '<a class="nav-link js-scroll-trigger" href="../perfil.php">Perfil</a>';

                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

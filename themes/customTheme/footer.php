<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
    <footer class="site-footer contenedor">
        <hr>
        <div class="contenido-footer">
            <?php
            $args = array(
                'theme_location' => 'menu-footer',
                'container' => 'nav',
                'menu_class' => 'footer-menu',
            );
            wp_nav_menu($args);

            ?>

            <p class="copyright">Todos los derechos reservados. <?php echo get_bloginfo('name') . " " . date('Y'); ?></p>
        </div>

    </footer>
    <?php wp_footer(); ?>
</body>

</html>
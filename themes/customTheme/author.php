<?php get_header() ?>

<main class="pagina seccion no-sidebars contenedor">
    <h2 class="text-center texto-primario">Autor: <?php echo get_queried_object()->display_name; ?></h2>
    <p class="text-center"><?php echo get_the_author_meta('description', get_queried_object()->ID) ?></p>
    <ul class="listado-blog">
        <?php get_template_part('template-parts/loop', 'blog'); ?>
    </ul>
</main>


<?php get_footer() ?>
<?php get_header() ?>

<main class="pagina seccion no-sidebars contenedor">
    <h2 class="text-center texto-primario">Categoria: <?php echo get_queried_object()->name; ?></h2>

    <ul class="listado-blog">
        <?php get_template_part('template-parts/loop', 'blog'); ?>
    </ul>
</main>


<?php get_footer() ?>
<?php

/*
* Template Name: Galerias
*/

get_header(); ?>

<main class="contenedor pagina seccion">
    <div class="contenido-principal">
        <?php while (have_posts()) : the_post(); ?>
            <h1 class="text-center texto-primario">
                <?php the_title() ?>
            </h1>

            <?php
            $galeria = get_post_gallery(get_the_ID(), false);
            $id_imagenes_galeria = explode(',', $galeria['ids']);
            ?>

            <ul class="galeria-imagenes">
                <?php $i = 1;
                foreach ($id_imagenes_galeria as $id) :

                    if ($i == 4 || $i == 6) {
                        $size = 'portrait';
                    } else {
                        $size = 'square';
                    }
                    $i++;
                    $imagenThumb = wp_get_attachment_image_src($id, $size)[0];
                    $imagen =  wp_get_attachment_image_src($id, 'full')[0]; ?>
                    <li>
                        <a href="<?php echo $imagen; ?>" data-lightbox="galeria">
                            <img src="<?php echo $imagenThumb ?>" alt="">
                        </a>
                    </li>
                <?php
                endforeach; ?>
            </ul>
        <?php endwhile ?>

    </div>
</main>

<?php get_footer(); ?>
<?php get_header('front'); ?>

<div class="main-info contenedor">
    <h3 class="text-center texto-primario"><?php the_field('titulo_home') ?></h3>
    <p class="text-center"><?php the_field('parrafo_home') ?></p>
</div>

<div class="seccion-areas">
    <ul class="contenedor-areas">
        <li class="area">
            <?php $area1 = get_field('area_1');
            $imagenArea1 = wp_get_attachment_image_src($area1['area_imagen'], 'mediano')[0]; ?>
            <img src="<?php echo $imagenArea1 ?>" alt="">
            <p><?php echo $area1['area_titulo'] ?></p>
        </li>

        <li class="area">
            <?php $area2 = get_field('area_2');
            $imagenArea2 = wp_get_attachment_image_src($area2['area_imagen'], 'mediano')[0]; ?>
            <img src="<?php echo $imagenArea2 ?>" alt="">
            <p><?php echo $area2['area_titulo'] ?></p>
        </li>

        <li class="area">
            <?php $area3 = get_field('area_3');
            $imagenArea3 = wp_get_attachment_image_src($area3['area_imagen'], 'mediano')[0]; ?>
            <img src="<?php echo $imagenArea3 ?>" alt="">
            <p><?php echo $area3['area_titulo'] ?></p>
        </li>

        <li class="area">
            <?php $area4 = get_field('area_4');
            $imagenArea4 = wp_get_attachment_image_src($area4['area_imagen'], 'mediano')[0]; ?>
            <img src="<?php echo $imagenArea4 ?>" alt="">
            <p><?php echo $area4['area_titulo'] ?></p>
        </li>
    </ul>
</div>

<section class="clases">
    <div class="contenedor seccion">
        <h2 class="text-center texto-primario">Nuestras clases</h2>
        <?php gymfitness_lista_clases(4); ?>

        <div class="contenedor-boton">
            <a href="<?php echo get_permalink(get_page_by_title('Nuestras Clases')); ?>" class="boton">Ver todas las clases</a>
        </div>

    </div>
</section>


<section class="instructores">
    <div class="contenedor seccion">
        <h2 class="text-center texto-primario">Nuestros instructores</h2>
        <p class="text-center">Instructores que te ayudaran a lograr tus objetivos</p>

        <?php gymfitness_lista_instructores(); ?>
    </div>
</section>


<section class="testimoniales">
    <h2 class="text-center texto-blanco">Testimoniales</h2>
    <div class="contenedor-testimoniales">
        <ul class="listado-testimoniales">
            <?php
            $args = array(
                'post_type' => 'testimoniales',
                'posts_per_page' => 10,
            );
            $testimoniales = new WP_Query($args);

            while ($testimoniales->have_posts()) : $testimoniales->the_post(); ?>
                <li class="testimonial text-center">
                    <blockquote><?php the_content() ?></blockquote>

                    <footer class="testimonial-footer">
                        <?php the_post_thumbnail('thumbnail') ?>
                        <p><?php the_title() ?></p>
                    </footer>
                </li>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>
    </div>
</section>

<?php get_footer(); ?>
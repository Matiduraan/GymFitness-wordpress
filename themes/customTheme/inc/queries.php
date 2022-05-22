<?php

function gymfitness_lista_clases($cantidad = -1)
{ ?>
    <ul class="lista-clases">
        <?php
        $args = array(
            'post_type' => 'gymfitness_clases',
            'posts_per_page' => $cantidad,
        );
        $clases = new WP_Query($args);

        while ($clases->have_posts()) : $clases->the_post(); ?>
            <li class="clase card gradient">
                <?php the_post_thumbnail('mediano') ?>
                <div class="contenido"><a href="<?php the_permalink(); ?>">
                        <h3>
                            <?php the_title() ?>
                        </h3>
                    </a>

                    <p><?php the_field('dias_de_clase') ?> - <?php the_field('hora_inicio'); ?> a <?php the_field('hora_fin'); ?> </p>
                </div>
            </li>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </ul>
<?php
}

?>


<?php function gymfitness_lista_instructores()
{ ?>
    <ul class="listado-instructores">
        <?php $args = array(
            'post_type' => 'instructores',
            'posts_per_page' => 30
        );
        $instructores = new WP_Query($args);
        while ($instructores->have_posts()) : $instructores->the_post();
        ?>
            <li class="instructor">
                <?php the_post_thumbnail('mediano'); ?>
                <div class="contenido text-center">
                    <h3><?php the_title() ?></h3>
                    <?php the_content() ?>
                    <div class="especialidad">
                        <?php $esp = get_field('especialidad');
                        foreach ($esp as $e) : ?>
                            <span class="etiqueta"><?php echo $e; ?></span>
                        <?php endforeach ?>
                    </div>
                </div>
            </li>
        <?php endwhile;
        wp_reset_postdata(); ?>
    </ul>
<?php
} ?>
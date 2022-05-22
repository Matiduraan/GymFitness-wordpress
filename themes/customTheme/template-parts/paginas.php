<?php while (have_posts()) : the_post(); ?>
    <h1 class='text-center texto-primario'><?php the_title() ?></h1>

    <?php the_post_thumbnail('blog', array('class' => 'imagen-destacada')); ?>
    <?php
    //Revisar si el custom post type es clases
    if (get_post_type() === 'gymfitness_clases') { ?>

        <p class='informacion-clase'><?php the_field('dias_de_clase') ?> - <?php the_field('hora_inicio'); ?> a <?php the_field('hora_fin'); ?> </p>

    <?php
    }
    ?>

    <?php the_content() ?>
<?php endwhile; ?>
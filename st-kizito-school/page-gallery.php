<?php get_header(); ?>
<main class="site-main">
    <h2 class="page-title">SCHOOL GALLERY</h2>
    <section class="gallery-container">
        <figure class="gallery-item"><img src="<?php echo sks_image('IMG-20261027-WA0006.jpg'); ?>"
                alt="School mass procession" data-caption="Mass procession for our school day">
            <figcaption class="caption">Mass procession for our school day</figcaption>
        </figure>
        <figure class="gallery-item"><img src="<?php echo sks_image('IMG-20261026-WA0002.jpg'); ?>"
                alt="School water project" data-caption="Our water project">
            <figcaption class="caption">Our water project</figcaption>
        </figure>
        <figure class="gallery-item"><img src="<?php echo sks_image('IMG-20261027-WA0009.jpg'); ?>"
                alt="School compound and classrooms" data-caption="School compound and classrooms">
            <figcaption class="caption">School compound and classrooms</figcaption>
        </figure>
        <figure class="gallery-item"><img src="<?php echo sks_image('IMG-20261027-WA0008.jpg'); ?>"
                alt="Inter-house sports" data-caption="Inter-House Sports & Football">
            <figcaption class="caption">Inter-House Sports & Football</figcaption>
        </figure>
        <figure class="gallery-item"><img src="<?php echo sks_image('IMG-20261027-WA0012.jpg'); ?>"
                alt="Annual school celebrations" data-caption="Annual School Celebrations">
            <figcaption class="caption">Annual School Celebrations</figcaption>
        </figure>
        <figure class="gallery-item"><img src="<?php echo sks_image('IMG-20261027-WA0005.jpg'); ?>"
                alt="Main offices building" data-caption="Our main offices building">
            <figcaption class="caption">Our main offices building</figcaption>
        </figure>
    </section>
    <div id="sks-lightbox" class="lightbox" role="dialog" aria-modal="true" aria-label="Image preview"><button
            class="lightbox-close" type="button" aria-label="Close">&times;</button><img src="" alt="">
        <p class="lightbox-caption"></p>
    </div>
</main><?php get_footer(); ?>
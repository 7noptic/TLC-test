<?php
/**
 * Template Name: Логистика
 * Template Post Type: uslugi
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TLC
 */

get_header();
?>

    <section class="breadcrumbs breadcrumbs-gray">
        <?php if (function_exists('kama_breadcrumbs')) {
            kama_breadcrumbs('');
        } ?>
    </section>

    <section class="banner banner-post">
        <div class="banner-slide" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
            <h1 class="banner__title"><?php the_field('logistika_-_banner_-_zagolovok'); ?></h1>
            <div class="banner__content">

                <?php if (have_rows('logistika_-_banner_-_kratkie_opisaniya')): ?>
                    <?php while (have_rows('logistika_-_banner_-_kratkie_opisaniya')): the_row();

                        // переменные
                        $content = get_sub_field('tekst');

                        ?>

                        <div class="banner__item"><?php echo $content; ?></div>

                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
            <a class="btn btn-border-white banner__btn js-call">ОСТАВИТЬ ЗАЯВКУ</a>
        </div>
    </section>


<?php if (have_rows('logistika_-_varianty_dostavki')): ?>

    <section class="delivery">
        <h2 class="title">ВЫБЕРИТЕ ВАРИАНТ ДОСТАВКИ ДЛЯ РАСЧЁТА</h2>

        <?php while (have_rows('logistika_-_varianty_dostavki')): the_row();

            // переменные
            $izobrazhenie = get_sub_field('izobrazhenie');
            $nazvanie = get_sub_field('nazvanie');
            $opisanie = get_sub_field('opisanie');
            $ssylka = get_sub_field('ssylka');

            ?>

            <a href="<?php echo $ssylka; ?>" class="delivery-item">
                <div class="delivery-item__img">
                    <img src="<?php echo $izobrazhenie['url']; ?>" alt="<?php echo $izobrazhenie['alt'] ?>"/></div>

                <div class="delivery-item__info">
                    <p href="#" class="delivery-item__name"><?php echo $nazvanie; ?></p>
                    <p class="delivery-item__descr"><?php echo $opisanie; ?></p>
                    <div class="delivery-item__list">

                        <?php if (have_rows('dop_harak-ki')): ?>
                            <?php while (have_rows('dop_harak-ki')): the_row();

                                // переменные
                                $srok = get_sub_field('srok');
                                $czena = get_sub_field('czena');

                                ?>

                                <div class="delivery-item__text">Срок: <b><?php echo $srok; ?></b></div>
                                <div class="delivery-item__text delivery-item__price">Цена:
                                    <b><?php echo $czena; ?></b></div>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>
                </div>
            </a>

        <?php endwhile; ?>

    </section>

<?php endif; ?>


<?php get_template_part('template-parts/sections/banner-delivery'); ?>


    <section class="info-block">
        <div class="info-block__content">
            <h2 class="info-block__title"><?php the_field('informacziya_o_logistike_-_zagolovok'); ?></h2>
            <div class="info-block__text">
                <?php the_field('informacziya_o_logistike_-_opisanie'); ?>
            </div>
        </div>
        <div class="info-block__img">
            <?php

            $image = get_field('informacziya_o_logistike_-_izobrazhenie');

            if( !empty($image) ): ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>
        </div>
    </section>


<?php if (have_rows('nashi_uslugi_-_taby')): ?>

    <section class="service-tab">
        <h2 class="title">НАШИ УСЛУГИ</h2>

        <nav class="service-tab-nav js-service-tab-nav">

            <?php while (have_rows('nashi_uslugi_-_taby')): the_row();

                // переменные
                $nazvanie_taba = get_sub_field('nazvanie_taba');

                ?>

                <a class="service-tab-nav__link js-service-link"><?php echo $nazvanie_taba; ?></a>

            <?php endwhile; ?>

        </nav>


        <?php while (have_rows('nashi_uslugi_-_taby')): the_row(); ?>

            <div class="tab service-tab__item js-service-tab">

            <?php if (have_rows('dochernij_tab')): ?>

                <nav class="service-nav js-service-subnav">

                    <?php while (have_rows('dochernij_tab')): the_row();

                        // переменные
                        $nazvanie_dochernego_taba = get_sub_field('nazvanie_dochernego_taba');
                        $opisanie = get_sub_field('opisanie');
                        $srok = get_sub_field('srok');
                        $czena = get_sub_field('czena');
                        $ssylka = get_sub_field('ssylka');
                        $izobrazhenie = get_sub_field('izobrazhenie');

                        ?>

                        <a class="service-nav__link js-service-nav__sublink"><?php echo $nazvanie_dochernego_taba; ?></a>
                    <?php endwhile; ?>

                </nav>

                <?php if (have_rows('dochernij_tab')): ?>
                    <?php while (have_rows('dochernij_tab')): the_row();
                        // переменные
                        $nazvanie_dochernego_taba = get_sub_field('nazvanie_dochernego_taba');
                        $opisanie = get_sub_field('opisanie');
                        $srok = get_sub_field('srok');
                        $czena = get_sub_field('czena');
                        $ssylka = get_sub_field('ssylka');
                        $izobrazhenie = get_sub_field('izobrazhenie');

                        ?>

                        <div class="tab service__content service-tab__content js-service-subtab">
                            <div class="service-item">
                                <div class="service-item__content">
                                    <div class="service-item__text"><?php echo $opisanie; ?></div>
                                    <a href="<?php echo $ssylka; ?>"
                                       class="btn btn-border-red service-item__btn">ПОДРОБНЕЕ</a>
                                    <div class="delivery-item__text">Срок: <b><?php echo $srok; ?></b></div>
                                    <div class="delivery-item__text delivery-item__price">Цена:
                                        <b><?php echo $czena; ?></b></div>
                                </div>
                                <div class="service-item__img">
                                    <img src="<?php echo $izobrazhenie['url']; ?>"
                                         alt="<?php echo $izobrazhenie['alt'] ?>"/></div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>

                </div>

            <?php endif; ?>

        <?php endwhile; ?>

    </section>

<?php endif; ?>


<?php if (have_rows('logistika_-_preimushhestva')): ?>

    <section class="catalog">
        <h2 class="title title-pl catalog__title">ПОЧЕМУ НАМ ДОВЕРЯЮТ</h2>

        <?php while (have_rows('logistika_-_preimushhestva')): the_row();

            // переменные
            $zagolovok = get_sub_field('zagolovok');
            $podzagolovok = get_sub_field('podzagolovok');
            $opisanie_utp = get_sub_field('opisanie_utp');
            $banner = get_sub_field('banner');

            ?>

            <div class="catalog-item catalog-item-big">
                <img src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt'] ?>"/>
                <div class="catalog-item__content">
                    <h3 class="catalog-item__title"><?php echo $zagolovok; ?><?php echo $podzagolovok; ?></h3>
                    <p class="catalog-item__text"><?php echo $opisanie_utp; ?></p>
                </div>
            </div>

        <?php endwhile; ?>

    </section>

<?php endif; ?>


<?php get_template_part('template-parts/sections/company'); ?>


<?php get_template_part('template-parts/sections/banner-faq'); ?>



    <!-- SEO БЛОК -->
    <section class="info-block info-block-left">
        <div class="info-block__img">
            <?php

            $image = get_field('logistika_-_seo_-_izobrazhenie');

            if( !empty($image) ): ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>
        </div>
        <div class="info-block__content">
            <h2 class="info-block__title"><?php the_field('logistika_-_seo_-_zagolovok'); ?></h2>
            <div class="info-block__text"><?php the_field('logistika_-_seo_-_opisanie'); ?></div>
        </div>
    </section>
    <!-- end SEO БЛОК -->



<?php

$post_objects = get_field('logistika_-_faq');

if ($post_objects): ?>

    <section class="faq">
        <header class="faq-header">
            <h2 class="title">ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ</h2>
            <a href="" class="btn btn-border-red faq__btn">ВСЕ ВОПРОСЫ</a>
        </header>
        <div class="faq__content">

            <?php foreach ($post_objects as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>

                <div class="faq-item">
                    <header class="faq-item__header"><?php the_title(); ?></header>
                    <div class="tab faq-item__content"><?php the_content(); ?></div>
                </div>

            <?php endforeach; ?>

        </div>
        <div class="faq-img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/faq_img.svg" alt="faq">
        </div>
    </section>

    <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
<?php endif;

?>



<?php

$post_objects = get_field('logistika_-_klienty');

if ($post_objects): ?>
    <section class="client">
        <header class="client-header">
            <h2 class="title client__title">
                НАШИ КЛИЕНТЫ
            </h2>
            <nav class="client-nav">
                <div class="client-pagination"></div>
            </nav>
        </header>
        <div class="client-slider">
            <div class="swiper-client">
                <div class="swiper-wrapper">
                    <?php foreach ($post_objects as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>

                        <div class="swiper-slide">
                            <p class="client__img"><?php the_post_thumbnail(); ?></p>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
            <a href="#" class="client-prev">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arr.svg" alt="">
            </a>
            <a href="#" class="client-next">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arr.svg" alt="">
            </a>
        </div>
    </section>
    <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
<?php endif;

?>

<?php
get_footer();

<?php
$id = $block['id'];
$idCss = '#' . $id;
$container = get_field( 'container' );
// Desktop
$bgDesctopImage = get_field( 'tlo_desktop' );
$pDesktop = get_field( 'padding_gora_dol_desktop' );
$poDesktop = get_field( 'pozycja_tla_desktop' );
$bgKolor = get_field( 'kolor_tla' );

// Tablet
$bgTabletImage = get_field( 'tlo_desktop_tablet' );
$pTablet = get_field( 'padding_gora_dol_tablet' );
$poTablet = get_field( 'pozycja_tla_tablet' );
$bgKolorTablet = get_field( 'kolor_tla_tablet' );

// Mobile
$bgMobileImage = get_field( 'tlo_mobile' );
$pMobile = get_field( 'padding_gora_dol_mobile' );
$poMobile = get_field( 'pozycja_tla_mobil' );
$bgKolorMobile = get_field( 'kolor_tla_mobile' );


$bg = get_field( 'kolor_tla_main' );
$height = get_field( 'minimalna_wysokosc' );

$conteinerStyle = $container == 'container' ? 'header-section header-section-normal' : 'header-section container-full';
// $bgKolorElement = $bgKolor ? '<span class="header-section__bg" style="background-color:' .$bgKolor. '"></span>' : false;

$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

?>

<div id="<?php echo $id; ?>" class="<?php echo $conteinerStyle; ?> <?php echo $className; ?>">
    <?php echo '<span class="header-section__bg" ></span>'; ?>
    <?php echo $container == 'container-full' ? '<div class="container">': false; ?>
    <div class="row">
        <div class="col">
            <InnerBlocks />
        </div>
    </div>
    <?php echo $container == 'container-full' ? '</div>': false; ?>
</div>

<style>
    <?php if($bg) : ?>
    <?php echo $idCss; ?>{
        background-color: <?php echo $bg; ?>
    }   
 <?php endif; ?>
/* Desktop    */
<?php if($bgDesctopImage) : ?>

        <?php echo $idCss; ?> {
            background-image: url(<?php echo $bgDesctopImage; ?>);
        }
<?php endif; ?>
<?php if($pDesktop) :?>
    
        <?php echo $idCss; ?> {
           padding:<?php echo $pDesktop; ?>px 0;
        }
    
<?php endif; ?>
<?php if($poDesktop) :?>
        <?php echo $idCss; ?> {
           background-position:<?php echo $poDesktop['label']; ?>;
        }
<?php endif; ?>

<?php if($bgKolor) : ?>
        
        <?php echo $idCss; ?> .header-section__bg {
            background-color: <?php echo $bgKolor; ?>;
        }
    
<?php endif; ?>

/* Tablet */
<?php if($bgTabletImage) :?>
    @media only screen and (max-width: 1024px) {
        <?php echo $idCss; ?>{
            background-image: url(<?php echo $bgTabletImage; ?>);
        }
    }
<?php endif; ?>
<?php if($pTablet) :?>
    @media only screen and (max-width: 1024px) {
        <?php echo $idCss; ?>  {
           padding:<?php echo $pTablet; ?>px 0;
        }
    }
<?php endif; ?>

<?php if($poTablet) : ?>
     @media only screen and (max-width: 1024px) {
        <?php echo $idCss; ?> {
           background-position:<?php echo $poTablet['label']; ?>;
        }
    }
<?php endif; ?>

<?php if($bgKolorTablet) : ?>
    @media only screen and (max-width: 1024px) {
        
        <?php echo $idCss; ?> .header-section__bg {
            background-color: <?php echo $bgKolorTablet; ?>;
        }
    }
<?php endif; ?>

/* Mobile */

<?php if($bgMobileImage) : ?>
    @media only screen and (max-width: 768px) {
        
        <?php echo $idCss; ?> {
            background-image: url(<?php echo $bgMobileImage; ?>);
            background-position:<?php echo $poMobile['label']; ?>;
        }
    }
<?php endif; ?>
<?php if($poMobile) : ?>
    @media only screen and (max-width: 768px) {
        
        <?php echo $idCss; ?> {
            background-position:<?php echo $poMobile['label']; ?>;
        }
    }
<?php endif; ?>
<?php if($pMobile) :?>
    @media only screen and (max-width: 768px) {
        <?php echo $idCss; ?> {
           padding:<?php echo $pMobile; ?>px 0;
        }
    }
<?php endif; ?>

<?php if($bgKolorMobile) : ?>
    @media only screen and (max-width: 768px) {
        
        <?php echo $idCss; ?> .header-section__bg {
            background-color: <?php echo $bgKolorMobile; ?>;
        }
    }
<?php endif; ?>

</style>
<?php 
$link = get_field( 'button' );
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
endif;

$style = get_field( 'style' );
$btClass = "btn";
if($style == 'btn-revers'){
    $btClass = 'btn-revers';
}

$class_name = '';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
    $class_name .= ' text-' . $block['align'];
}

?>

<?php if( $link ): ?>
    <div class="btn-wraper <?php echo  $class_name; ?>">
    <a class="<?php echo $btClass; ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
    <?php echo $link_title ? '<span>' . $link_title .'</span>' : false ;?>
    </a>
    </div>
<?php endif; ?>
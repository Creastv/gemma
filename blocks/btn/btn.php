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

$class_name = 'testimonial-block';
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
        <svg xmlns="http://www.w3.org/2000/svg" width="21.65" height="13.548" viewBox="0 0 21.65 13.548">
        <g id="Group_724" data-name="Group 724" transform="translate(-215.942 -746.82)">
            <path id="Path_1583" data-name="Path 1583" d="M33.465,747.174l6.42,6.42-6.42,6.42" transform="translate(197)" fill="none" stroke="#fff" stroke-width="1"/>
            <path id="Path_1584" data-name="Path 1584" d="M18.942,753.594H40.2" transform="translate(197)" fill="none" stroke="#fff" stroke-width="1"/>
        </g>
        </svg>
    </a>
    </div>
<?php endif; ?>
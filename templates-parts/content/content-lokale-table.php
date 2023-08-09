<table id="mieszkania-inw" cellspacing="0" class=" table table-hover" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th data-priority="2"></th>
            <th data-priority="1">Nazwa i liczba pokoi</th>
            <th data-priority="6">Powierzchnia</th>
            <th data-priority="7">Cena</th>
            <th data-priority="8">Udogodienia</th>
            <th data-priority="5">Status</th>
            <th data-priority="4"></th>
        </tr>
    </thead>
    <tbody>
        <?php while ( have_posts() ) : the_post(); 
    get_template_part( 'templates-parts/content/content-lokale-table', 'single' ); 
    endwhile; ?>
    </tbody>
</table>


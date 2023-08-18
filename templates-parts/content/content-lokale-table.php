<table id="mieszkania-inw" cellspacing="0" class=" table table-hover" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th data-priority="2"></th>
            <th class="bdoll" data-priority="10">Baby doll</th>
            <th class="name" data-priority="1">Nazwa i liczba pokoi</th>
            <th data-priority="6">Powierzchnia</th>
            <th class="cena" data-priority="7">Cena</th>
            <th data-priority="8">Udogodnienia</th>
            <th data-priority="5">Status</th>
            <th class="ws" data-priority="9">W. spacer</th>
            <th data-priority="4"></th>
        </tr>
    </thead>
    <tbody>
        <?php while ( have_posts() ) : the_post(); 
    get_template_part( 'templates-parts/content/content-lokale-table', 'single' ); 
    endwhile; ?>
    </tbody>
</table>


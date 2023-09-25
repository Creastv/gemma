<table id="mieszkania-inw" cellspacing="0" class=" table table-hover" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th  class="name" >Nazwa i liczba pokoi</th>
            <th  >Powierzchnia</th>
            <th class="cena" >Cena</th>
            <th >Udogodnienia</th>
            <th >Status</th>
            <th ></th>
        </tr>
    </thead>
    <tbody>
        <?php while ( have_posts() ) : the_post(); 
    get_template_part( 'templates-parts/content/content-lokale-table', 'single' ); 
    endwhile; ?>
    </tbody>
</table>


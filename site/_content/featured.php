<?php if (isset($thumbnails)): ?>
<div class="clearfix">
    <div class="grid_24">
        
        <ul id="thumbnails">
            <?php foreach ($thumbnails as $i => $t): ?>
            <li>
                <a href="javascript:window.slr.slideTo(<?php echo $i++ ?>)">
                    <img src="/media/<?php echo $t ?>" alt="">
                </a>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<?php else: ?>
<div class="clearfix">
    <div class="grid_24">
        <div id="my_poststypewidget-2">
            <ul class="post_list banners_custom_posts">
                <li class="cat_post_item-1 clearfix">
                <div class="inner">
                    <a href="#">
                    <img width="86" height="88" src="./base_files/banner-img01.jpg" class="attachment-86x88 wp-post-image" alt="banner-img01" title="banner-img01"></a>
                    <a class="post-title" href="#" rel="bookmark" title="">Catering</a>
                    <div>
                    </div>
                    <div class="post_content">
                         Catering especializado para cualquier tipo de evento. ¿Qué quiere ofrecerle a sus comensales para esa ocasión especial? 
                    </div>
                    <a href="/eventos/catering" class="button">más...</a>
                </div>
                </li>
                <li class="cat_post_item-2 clearfix">
                <div class="inner">
                    <a href="#">
                    <img width="86" height="88" src="./base_files/banner-img02.jpg" class="attachment-86x88 wp-post-image" alt="banner-img02" title="banner-img02"></a>
                    <a class="post-title" href="#" rel="bookmark" title="">Banquetes</a>
                    <div>
                    </div>
                    <div class="post_content">
                        Nuestros ricos banquetes harán que su evento sea inolvidable. <br>
                        Dese la oportunidad de probar nuestro sabor.
                        <br>
                    </div>
                    <a href="/cocina-gourmet/banquetes-finos" class="button">más...</a>
                </div>
                </li>
                <li class="cat_post_item-3 clearfix">
                <div class="inner">
                    <a href="#">
                    <img width="86" height="88" src="./base_files/banner-img03.jpg" class="attachment-86x88 wp-post-image" alt="banner-img03" title="banner-img03"></a>
                    <a class="post-title" href="#" rel="bookmark" title="">Comedores</a>
                    <div>
                    </div>
                    <div class="post_content">
                        Servicio de comedores industriales y ejecutivos con una amplia gama de opciones presupuestales y de operación.
                    </div>
                    <a href="/comedores" class="button">más...</a>
                </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php endif ?>
<?php if (isset($slides)): ?>
<section id="slider-wrapper">
<div class="container_24 clearfix">
    <div class="grid_24">
        <div id="slider">
            <?php $i = 0; foreach ($slides as $title => $s): $i++ ?>
            <img src="/media/<?php echo $s ?>" alt="" <?php if ($title): ?>title="#sliderCaption<?php echo $i ?>" <?php endif ?>/>
            <?php endforeach ?>
        </div>
        <?php $i = 0; foreach ($slides as $title => $s): $i++; if (!$title): continue; endif ?>
        <div id="sliderCaption<?php echo $i ?>" class="nivo-html-caption">
            <h2><?php echo $title ?></h2>
        </div>
        <?php endforeach ?>
    </div>
</div>
</section>
<?php endif ?>
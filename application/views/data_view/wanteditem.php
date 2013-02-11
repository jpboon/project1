<div data-role="content">      
    <div data-role="content">
        <div id="title">
            <?= $item->getTitle(); ?>
        </div>
        <br>
        <div id="pubdate">
            <?= $item->getPubdate(); ?>
        </div>
        <br>

        <?php foreach ($item->getImages() as $image): ?>
            <center><img src="<?= $image; ?>" alt="missing" width="200"></center>
            <br>
        <?php endforeach ?>

        <div id="info">         
            <?= $item->getDescription(); ?>
            <br>  
            <br>   
            <b>zaaknummer</b><br>
            <?= $item->getZaaknummer(); ?>
            <br>  
            <br> 
            <b>datum delict</b><br> 
            <?= $item->getDatumdelict(); ?>
            <br>
            <br>  
            <b>plaats delict</b><br> 
            <?= $item->getPlaatsdelict(); ?>
            <br>  
            <br> 
            <b>signalement</b><br> 
            <?= $item->getSignalement(); ?>
            <br>  
            <? if (strlen($item->getVideo()) > 0) { ?>
                <iframe width="280" height="280" src="<?= $item->getVideo(); ?>" frameborder="0"></iframe> 
                <br>
                <br>
            <? } ?>
            <b>omschrijving</b> 
            <?= $item->getOmschrijving(); ?>
        </div>
        <br>
        <a style="float:right" href="/index.php/policecall/" data-role="button" data-inline="true" data-theme="a">Direct contact</a>
    </div>
</div>

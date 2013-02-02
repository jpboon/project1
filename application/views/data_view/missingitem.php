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
            <b>vermist sinds</b><br> 
            <?= $item->getVermistsinds(); ?>
            <br>
            <br>  
            <b>laatst gezien in</b><br> 
            <?= $item->getLaatstgezienin(); ?>
            <br>  
            <br> 
            <b>signalement</b><br> 
            <?= $item->getSignalement(); ?>
            <br>
            <b>omschrijving</b> 
            <?= $item->getOmschrijving(); ?>
        </div>
        <br>

    </div>

</div>

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
        <div id="info">         
            <?= $item->getDescription(); ?>
            <br>        
           zaaknummer:  <?= $item->getZaaknummer(); ?>
           <br>  
           omschrijving: <?= $item->getOmschrijving(); ?>
           <br>  
           geolat: <?= $item->getGeolat(); ?>
        </div>
        <br>

    </div>

</div>

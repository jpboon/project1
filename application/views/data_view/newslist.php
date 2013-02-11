<div data-role="content">      
    <ul data-role="listview" data-theme="d" data-icon="info">
        <?php foreach ($items as $item): ?> 
        <li><a href="newsitem/<?= $item->getId(); ?>">
                <font style="font-size: small; white-space:normal">
                <?= $item->getTitle(); ?>
                </font>
                <br>
                <font style="font-size:x-small; white-space:normal">
                <? if(strlen($item->getDescription()) > 135 ) { ?>                           
                    <?= substr($item->getDescription(), 0, 135) . "..." ?> 
                <? } else { ?> 
                    <?= $item->getDescription() ?> 
                <? } ?>
                </font>
            </a></li>
        <?php endforeach ?>
    </ul>
</div>

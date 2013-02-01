<div data-role="content">      
    <div data-role="content">
        <ul data-role="listview" data-theme="c">
            <li data-role="list-divider">Nieuws</li>
            <?php foreach ($items as $item): ?> 
                <li><a href="newsitem/<?= $item->getId(); ?>">
                        <font style="font-size: small; white-space:normal">
                        <?= $item->getTitle(); ?>
                        </font>
                        <br>
                        <font style="font-size:x-small; white-space:normal">
                        <?= $item->getDescription(); ?>
                        </font>
                    </a></li>

            <?php endforeach ?>
        </ul>
    </div>

</div>

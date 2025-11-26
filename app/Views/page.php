kontroler strony

<?php 

foreach ($blocks as $b) {
    echo BlockLoader::render($b['type'], $b['data']);
}
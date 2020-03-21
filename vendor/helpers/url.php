<?php 

function asset($asset) {
    global $config;
    $extensi = explode(".", $asset);
    $extensi = end($extensi);
    return "{$config['base_url']}/assets/{$extensi}/{$asset}";
}
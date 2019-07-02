<?php

use MCServerStatus\MCPing;

require __DIR__ . '/vendor/autoload.php';

$response = MCPing::check('SERVER HOST');
$players = (int) $response->players;

//var_dump($response);

if ($players == 1) {
   $player = $response->sample_player_list[0]['name'] ?? "1 player";
   $url = "https://img.shields.io/badge/minecraft-$player-success.svg";
} elseif ($players > 0) {
   $url = "https://img.shields.io/badge/minecraft-$players players-success.svg";
} else {
   $url = "https://img.shields.io/badge/minecraft-$players players-yellowgreen.svg";
}

$contents = file_get_contents($url);

// header('Location: ' . $url, true, 302);\

header('Content-type: image/svg+xml');
echo $contents;

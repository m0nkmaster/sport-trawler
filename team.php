<?php

//$file = 'rugby-union-teams.txt';
$file = 'rugby-league-teams.txt';
//$file = 'football-teams.txt';
//$file = 'cricket-teams.txt';

$prefix = 'http://m.bbc.co.uk';
$suffix = '';

$data = file_get_contents($file);

preg_match_all("/(?:<a href=\")(?!#|java){1}([-\/a-z]*)/", $data, $matches);

foreach ($matches[1] as $team) {
    echo $prefix . $team . $suffix . "\n";
}

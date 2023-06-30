<?php

    $date = date('Ymd'); 

    $api = 'https://www.fotmob.com/api/';
    $leagues_url = $api.'allLeagues';
    $matches_url = $api.'matches?date='.$date;

    $json = file_get_contents($leagues_url, JSON_PRETTY_PRINT);
    $data = json_decode($json);
    $json = json_encode($data, JSON_PRETTY_PRINT);
            $file = fopen('leagues.json','w+');
            fwrite($file, $json);
            fclose($file);
 
    $json = file_get_contents($matches_url, JSON_PRETTY_PRINT);
    $data = json_decode($json);
    $json = json_encode($data, JSON_PRETTY_PRINT);
            $file = fopen('matches.json','w+');
            fwrite($file, $json);
            fclose($file);
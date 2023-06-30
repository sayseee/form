<?php
$api = 'https://www.fotmob.com/api/';
$leagues_url = $api.'allLeagues';
$league_url = $api.'leagues?id='.$league_id.'&overview&'.$league_slug;
$matches_url = $api.'matches?date='.$date;
$match_url = $api.'matchDetails?matchId'.$match_id;
$team_url = $api.'teams?id'.$team_id.'&overview&'.$team_slug;



                                echo $id_1;
                                echo $all->name;
                                echo $all->played;
                                echo $all->wins;
                                echo $all->draws;
                                echo $all->losses;
                                echo $all->scoresStr;
                                echo $all->goalConDiff;
                                echo $all->pts;
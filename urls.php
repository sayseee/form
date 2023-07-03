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


                                
                $form = array(); 
                foreach($tables as $k => $v) { 
                    if($k == 'table'):
                        $table = $tables->table;
                        foreach($table as $tab):
                            $data = $tab->data;
                            foreach($data as $d => $x):                        
                        if($d == 'table'):
                            $tabbed = $data->table;
                            foreach($tabbed as $tabs => $tab):
                            if($tabs == 'form'):
                                $form = $tabbed->form;
                            endif;
                            endforeach;
                        elseif($d == 'tables'):
                            $tabbed = $data->tables;
                            foreach($tabbed as $tabs => $tab):
                                if($tabs == 'form'):
                                $form = $tabbed->form;
                            endif;
                            endforeach;
                        endif;
                        endforeach;
                        endforeach;
                        endif;
                }



                if($stats != null) {

                    echo '<h5 class="">Team Statistics</h5>';
                    echo '<div class="match-team-stats">';
                    
                        echo '<div class="statList">';
                        echo '<div class="statList-item"><span>#</span><span>Home Team Stats</span><span></span></div>';
                    foreach($stats as $stat) {
                        foreach($stat->topThree as $tt) {
                            if ($tt->teamId == $home_id):
                                echo '<div class="statList-item">';
                                    echo '<span>'.$tt->rank.'</span>';
                                    echo '<span>'.$stat->header.'</span>';
                                    echo '<span>'.$tt->value.'</span>';;
                                    echo '</div>';
                            endif;   
                        }
                    }
                        echo '</div>';
                        
                        echo '<div class="statList">';
                        echo '<div class="statList-item"><span>#</span><span>Away Team Stats</span><span></span></div>';
                    foreach($stats as $stat) {
                        foreach($stat->topThree as $tt) { 
                            if ($tt->teamId == $away_id):
                                echo '<div class="statList-item">';
                                    echo '<span>'.$tt->rank.'</span>';
                                    echo '<span>'.$stat->header.'</span>';
                                    echo '<span>'.$tt->value.'</span>';;
                                    echo '</div>';
                            endif;  
                        }
                    }
                        echo '</div>';
                echo '</div>';
                } else {
                    echo '';
                }
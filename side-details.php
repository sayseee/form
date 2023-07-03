<?php
require_once 'functions.php';
require_once 'inc.php';

$match_id = $_GET['id'];
$match = get_match_details($match_id); 
$obj = get_leagues();
echo get_teams_match_details($obj, $match, $match_id);
 
$stadium = $match->content->matchFacts->infoBox->Stadium;
$homeTeam = $match->general->homeTeam->name;
$awayTeam = $match->general->awayTeam->name;
$data_time = $match->general->matchTimeUTC;
$league_id = $match->general->parentLeagueId; 
$l_id = $match->general->leagueId; 
$home_id = $match->general->homeTeam->id;
$away_id = $match->general->awayTeam->id;
$league = get_league_details($league_id);

$teamForm = $match->content->matchFacts->teamForm;
$data_home = $teamForm[0];
$data_away = $teamForm[1];
if ($league->overview->table == null): echo '';
else:
$tables = $league->overview->table[0]->data;
$legend = $league->table[0]->data->legend;
endif;

if ($league->overview->table == null): echo '';
else:
$dataComposite = $league->overview->table[0]->data->composite;
if($dataComposite == true): 
    foreach($tables->tables as $table):
        if($table->leagueId == $l_id):            
$all = $table->table->all;
$home = $table->table->home;
$away = $table->table->away; 
        endif;   
    endforeach;
else: 
$all = $league->table[0]->data->table->all;
$home = $league->table[0]->data->table->home;
$away = $league->table[0]->data->table->away;
endif;
endif;

$form = array(); 
?>
</div>
        <div id="scroll">
            <div class="content">
                <?php echo h2h($match); ?>

                <?php if(isset($league->table[0]->data->tables)) {
                    $all = $league->table[0]->data->tables[0]->table->all;
                    $home = $league->table[0]->data->tables[0]->table->home;
                    $away = $league->table[0]->data->tables[0]->table->away;
                }
                
                
                    if($teamForm == null) { 
                        echo ''; 
                    } else {
                        ?> 
                
            <h5 class="">Goal Statistics</h5>
            <div class="goals"><?php  echo get_team_forms($data_home, $data_away, $home_id, $away_id); ?></div>
            <?php } if ($league->overview->table == null): echo '';
else: ?>
            <h5 class="">Season Table - Home/Away</h5>
            <div class="league_table_form">              
                <table width="100%" class="form-table">
                    <thead>
                        <tr>
                            <th scope="col">Pos</th>
                            <th scope="col">Teams</th>
                            <th scope="col">P</th>
                            <th scope="col">W</th>
                            <th scope="col">D</th>
                            <th scope="col">L</th>
                            <th scope="col">Goals</th>
                            <th scope="col">Pts</th>
                        </tr>
                    </thead> 
                <?php
                
                foreach($all as $a):
                    if ($a->id == $home_id or $a->id == $away_id): 
                        echo '<tr>
                        <td><span style="padding:1px 4px 0; height:15px; '.(($a->qualColor == null )?'':':before{background-color:'.$a->qualColor.'}; width:3px; height: 15px;').'">'.$a->idx.'</span></td>
                        <td>'.$a->name.'</td>';
                        if ($a->id == $home_id):
                            $home_points = 0;
                            $ah_points = $a->pts;
                            $homeTeam = $a->name;
                            $ah_pos = $a->idx;
                            foreach($home as $ht):
                                if($ht->id == $a->id):
                                    echo '<td>'.$ht->played.'</td>
                                    <td>'.$ht->wins.'</td>
                                    <td>'.$ht->draws.'</td>
                                    <td>'.$ht->losses.'</td>
                                    <td>'.$ht->scoresStr.'</td>
                                    <td>'.$ht->pts.'</td>';
                                    $home_points = $ht->pts;
                                    $home_played = $ht->played;
                                    $all_points = $a->pts;
                                endif;
                            endforeach;
                            elseif($a->id == $away_id):
                                $away_points = 0;
                                $aw_points = $a->pts;
                                $aw_pos = $a->idx;
                                $awayTeam = $a->name;
                                foreach($away as $at): 
                                if ($at->id == $a->id):
                                    echo '<td>'.$at->played.'</td>
                                    <td>'.$at->wins.'</td>
                                    <td>'.$at->draws.'</td>
                                    <td>'.$at->losses.'</td>
                                    <td>'.$at->scoresStr.'</td>
                                    <td>'.$at->pts.'</td>';
                                    $away_points = $at->pts; 
                                    $away_played = $at->played; 
                                endif;
                            endforeach;
                        endif; 

                      echo '</tr>';
                    endif; 
                endforeach;
                ?>
            </table>
            <h5 style="text-align:center;">About the match</h5>
            <?php
            echo '<p>'.$homeTeam.' #'.$ah_pos.' in league standings is playing home against '.$awayTeam.' #'.$aw_pos.' '.(($stadium == null)?'':' at '.$stadium->name).' on '.$data_time.'.</p>';  
            echo '<p>'.$homeTeam.' has '.$home_points.' points from the last '.$home_played.' games played at home which is '.sprintf('%0.1f',($home_points/$ah_points)*100).'% of all points in league overall and 
            '.$awayTeam.' has '.$away_points.' points from the last '.$away_played.' games played at away which is '.sprintf('%0.1f',($away_points/$aw_points)*100).'% of all points in league overall and 
            </p>';  
                if($legend > 0) :
                foreach($legend as $le):
                foreach($le->indices as $index):
                        echo ($index + 1).' '.$le->title.'<br />';
                endforeach;
                endforeach;
                echo '';
                endif;
            ?>

        </div>
           <?php endif; if ($form == null) { 
                echo '';
           } else {?>
            <h5 class="">Form - Last 5</h5>
            <div class="form-last-five form">
                <?php 
                echo '<div>';
                foreach($form as $f) {
                    $scoresStr = $f->scoresStr;
                        if ($f->id == $home_id): 
                                echo '<p>&#10003; '.$f->shortName.' is ranked <span'.(($f->qualColor == null)?'':' style="background:'.$f->qualColor.';padding:1px 5px;color:black;font-weight:500;"').'>'.ordinal($f->idx).'</span> by form in the last '.$f->played.' games, with ';
                                echo $f->wins.' Wins ';
                                echo $f->draws.''.(($f->draws > 1)?' Draws':' Draw').' and ';
                                echo $f->losses.''.(($f->losses > 1)?' Losses':' Loss').'. Scoring '.strstr($scoresStr, '-', true).' and conceding '.substr($scoresStr, strlen($scoresStr)-1).' with an average of <span>'.sprintf("%.2f", ($f->pts/$f->played)).'</span> Points per game </p> ';
                        endif;   
                    }
                    echo '</div>';
                    echo '<div>';

                foreach($form as $f) {
                    $scoresStr = $f->scoresStr;
                        if ($f->id == $away_id): 
                            echo '<p>&#10003; '.$f->shortName.' is ranked <span'.(($f->qualColor == null)?'':' style="background:'.$f->qualColor.';padding:1px 5px;color:black;font-weight:500;"').'>'.ordinal($f->idx).'</span> by form in the last '.$f->played.' games, with ';
                            echo $f->wins.' Wins ';
                            echo $f->draws.''.(($f->draws > 1)?' Draws':' Draw').' and ';
                            echo $f->losses.''.(($f->losses > 1)?' Losses':' Loss').'. Scoring '.strstr($scoresStr, '-', true).' and conceding '.substr($scoresStr, strlen($scoresStr)-1).' with an average of <span>'.sprintf("%.2f", ($f->pts/$f->played)).'</span> Points per game </p> ';
                        endif;
                }
                    echo '</div>';
                ?>
            </div>
                    <?php } 

                    ?>
            </div>
        </div>
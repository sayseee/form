<?php
require_once 'functions.php';

$match_id = $_GET['id'];

$match = get_match_details($match_id);
echo '<div class="header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 2.7812 2.7817" style="enable-background:new 0 0 2.7812 2.7817;" xml:space="preserve">
            <g>
                
                    <rect x="-0.3262" y="1.1409" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -0.5762 1.3907)" style="fill:#00985F;" width="3.4337" height="0.4999"/>
            </g>
            <g>
                
                    <rect x="1.1407" y="-0.326" transform="matrix(0.7072 -0.707 0.707 0.7072 -0.5762 1.3905)" style="fill:#00985F;" width="0.4999" height="3.4337"/>
            </g>
            </svg></span><span class="sr-only">Close</span>
            </button>
';
$obj = get_leagues();
        foreach($obj as $key => $v): 
            if ($key == 'international') {
                $int = $obj->international;
                foreach($int as $league): 
                    foreach ($league->leagues as $int):
                        $league_id = $int->id;
                    if($match->general->parentLeagueId == $league_id) : 
                         echo '<div class="league-title" id="'.$match_id.' '.$league_id.'"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24" xml:space="preserve">

                         <g clip-path="url(#clip0_251_1953)"><path d="M15.421 16.21C15.2118 16.21 15.0025 16.1958 14.7933 16.1747C14.7262 16.1618 14.6632 16.1328 14.6098 16.0902C14.5564 16.0476 14.5141 15.9927 14.4865 15.9303C14.2705 15.1277 14.0613 14.3672 13.8588 13.6278C13.8215 13.5311 13.8193 13.4245 13.8524 13.3264C13.8856 13.2284 13.952 13.145 14.0403 13.0908L15.7983 11.5157C15.8717 11.4517 15.9659 11.4164 16.0634 11.4164C16.1608 11.4164 16.255 11.4517 16.3285 11.5157C16.9183 11.8377 17.4473 12.2603 17.8915 12.7645C17.9922 12.8892 18.0487 13.0438 18.052 13.204C18.0556 14.0818 17.7942 14.9402 17.302 15.667C17.297 15.6873 17.2875 15.7063 17.2743 15.7225C17.1826 15.8471 17.0601 15.9455 16.9188 16.0082C16.4337 16.1487 15.9305 16.217 15.4255 16.2108L15.421 16.21Z" fill="var(--MFFullscreenColorScheme-eventIconColor)"></path><path d="M9.742 14.5075C9.65784 14.5083 9.57626 14.4784 9.5125 14.4235C8.9621 14.0903 8.48294 13.6516 8.1025 13.1328C8.04032 13.045 8.00631 12.9403 8.005 12.8328C8.00467 12.0142 8.22127 11.2101 8.63275 10.5025C8.63808 10.4769 8.65313 10.4543 8.67475 10.4395C8.73687 10.3842 8.81072 10.3437 8.89075 10.321C9.37339 10.1327 9.88692 10.036 10.405 10.036C10.5652 10.022 10.7263 10.022 10.8865 10.036C10.9774 10.0458 11.0623 10.0863 11.127 10.151C11.1917 10.2157 11.2322 10.3006 11.242 10.3915C11.3673 10.936 11.5068 11.494 11.6395 12.052L11.7445 12.502C11.7619 12.5701 11.7608 12.6417 11.7411 12.7093C11.7215 12.7768 11.684 12.8379 11.6328 12.886L10.0075 14.41C9.97368 14.4438 9.93342 14.4705 9.88911 14.4886C9.84481 14.5066 9.79734 14.5156 9.7495 14.515H9.742V14.5075Z" fill="var(--MFFullscreenColorScheme-eventIconColor)"></path><path d="M13 5.5C11.5166 5.5 10.0666 5.93987 8.83323 6.76398C7.59986 7.58809 6.63856 8.75943 6.07091 10.1299C5.50325 11.5003 5.35472 13.0083 5.64411 14.4632C5.9335 15.918 6.64781 17.2544 7.6967 18.3033C8.7456 19.3522 10.082 20.0665 11.5368 20.3559C12.9917 20.6453 14.4997 20.4968 15.8701 19.9291C17.2406 19.3614 18.4119 18.4001 19.236 17.1668C20.0601 15.9334 20.5 14.4834 20.5 13C20.5 11.0109 19.7098 9.10322 18.3033 7.6967C16.8968 6.29018 14.9891 5.5 13 5.5ZM13.0908 18.5673L13.0488 18.4172C13.0344 18.3147 12.9835 18.2207 12.9054 18.1528C12.8272 18.0848 12.7271 18.0474 12.6235 18.0475C11.7633 18.0331 10.9272 17.7609 10.2235 17.266C10.1519 17.2305 10.0732 17.2115 9.99325 17.2105C9.94408 17.2062 9.89453 17.212 9.84769 17.2276C9.80086 17.2432 9.75774 17.2683 9.721 17.3012L9.21175 17.7828C8.23992 17.017 7.52432 15.9734 7.16018 14.7909C6.79604 13.6084 6.80062 12.3431 7.17332 11.1633C7.54602 9.98343 8.26916 8.94507 9.24652 8.18635C10.2239 7.42764 11.4091 6.98453 12.6445 6.916L12.7195 7.18075C12.7695 7.32725 12.8113 7.47375 12.8448 7.62025C12.868 7.68829 12.9065 7.75011 12.9573 7.80095C13.0081 7.85179 13.07 7.89029 13.138 7.9135H13.201C14.0367 8.03978 14.8483 8.29268 15.6078 8.6635C15.6611 8.69269 15.722 8.70498 15.7825 8.69875C15.8657 8.69937 15.9476 8.67761 16.0195 8.63575L16.7035 8.15425C17.7033 8.913 18.4441 9.96223 18.8246 11.1583C19.205 12.3543 19.2065 13.6387 18.8288 14.8356C18.4511 16.0326 17.7126 17.0835 16.7146 17.8445C15.7166 18.6056 14.5077 19.0395 13.2535 19.087L13.0908 18.5673Z" fill="var(--MFFullscreenColorScheme-eventIconColor)"></path></g>
                         </svg><span>'.$league->name.' - '.$match->general->leagueName.'</span></div>';
                        endif;
                endforeach; 
                endforeach;
            } 
            if ($key == 'countries') {
                $countries = $obj->countries;
                foreach($countries as $league): 
                    foreach ($league->leagues as $country):
                        $league_id = $country->id;
                    if($match->general->parentLeagueId == $league_id) : 
                        $flags = get_details_flags();
                        foreach($flags as $flag):
                            if($flag->name == $league->name) : 
                                echo '<div class="league-title" id="match-'.$match_id.' league-'.$league_id.'"><img class="flag" src="'.$flag->image.'"/> <span>'.$league->name.' - '.$match->general->leagueName.'</span></div>';
                            endif;
                        endforeach;
                    endif;
                endforeach; 
                endforeach;
            } 
        endforeach;
echo '<div class="team-names">';
        echo '<div class="home_team">
                <span><img class="league_flag" src="'.(($match->content->matchFacts->teamForm == null)?'https://www.fotmob.com/_next/static/media/team_fallback.3ae01170.png':$match->header->teams[0]->imageUrl).'" height="50" loading="lazy" /></span>
                <span class="name">'.$match->general->homeTeam->name.'</span>
                <span class="team_form">';
                if($match->content->matchFacts->teamForm == null) { echo ''; }
                else {
                $data_home = $match->content->matchFacts->teamForm[0];
                foreach ($data_home as $homeForm) :
                    $result = $homeForm->resultString;
                    $score = str_replace(" ","",$homeForm->score);
                    echo '<span class="'.$result.'">'.$score.'</span>';
                endforeach;
            }
                echo '</span>
            </div>';
        echo '<div class="dScore"><span>';
            if ($match->header->status->finished == false) :
                $time = $match->general->matchTimeUTCDate;
                $time = date('h:i', strtotime($time)); 
                echo $time;
            elseif ($match->header->status->reason->short == 'PP') : 
                echo 'PP';
            elseif ($match->header->status->cancelled == true) : 
                echo 'Canc.';
            elseif ($match->header->status->finished == true) : 
                echo $match->header->teams[0]->score.' - '.$match->header->teams[1]->score;
            endif;
                echo '</span><span>';
                if ($match->header->status->finished == true) : echo 'FT';
                elseif ($match->header->status->started == false) : echo 'Today'; 
                endif;
                echo '</span></div>';
        echo '<div class="away_team">
                <span><img class="league_flag" src="'.(($match->content->matchFacts->teamForm == null)?'https://www.fotmob.com/_next/static/media/team_fallback.3ae01170.png':$match->header->teams[1]->imageUrl).'" height="50" loading="lazy" /></span>
                <span class="name">'.$match->general->awayTeam->name.'</span>
                <span class="team_form">';
                if($match->content->matchFacts->teamForm == null) { echo ''; }
                else {
                $data_away = $match->content->matchFacts->teamForm[1];
                foreach (array_reverse($data_away) as $awayForm) :
                    $result = $awayForm->resultString;
                    $score = str_replace(" ","",$awayForm->score);
                    echo '<span class="'.$result.'">'.$score.'</span>';
                endforeach;
            }
                echo '</span>
            </div>';
echo '</div>';

?>
</div>
        <div id="scroll">
            <div class="content">
                <?php 
                $league_id = $match->general->parentLeagueId;  
                $league = get_league_details($league_id); 
                $home_id = $match->general->homeTeam->id;
                $away_id = $match->general->awayTeam->id; 
                if (isset($league->stats->teams)) {
                    $stats = $league->stats->teams;
                } else { $stats = null; }
                if (isset($league->table[0]->data->table)) {
                    $all = $league->table[0]->data->table->all;
                    $home = $league->table[0]->data->table->home;
                    $away = $league->table[0]->data->table->away; 
                    $form = $league->table[0]->data->table->form; 
                } elseif(isset($league->table[0]->data->tables)) {
                    $all = $league->table[0]->data->tables[0]->table->all;
                    $home = $league->table[0]->data->tables[0]->table->home;
                    $away = $league->table[0]->data->tables[0]->table->away;
                    $form = $league->table[0]->data->tables[0]->table->form;
                }
                
                if($league->table == null) {
                    echo '';
                } else { 
                ?>                
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
                            foreach($home as $ht):
                                if($ht->id == $a->id):
                                    echo '<td>'.$ht->played.'</td>
                                    <td>'.$ht->wins.'</td>
                                    <td>'.$ht->draws.'</td>
                                    <td>'.$ht->losses.'</td>
                                    <td>'.$ht->scoresStr.'</td>
                                    <td>'.$ht->pts.'-'.$a->pts.'</td>'; 
                                endif;
                            endforeach;
                            elseif($a->id == $away_id):
                                foreach($away as $at): 
                                if ($at->id == $a->id):
                                    echo '<td>'.$at->played.'</td>
                                    <td>'.$at->wins.'</td>
                                    <td>'.$at->draws.'</td>
                                    <td>'.$at->losses.'</td>
                                    <td>'.$at->scoresStr.'</td>
                                    <td>'.$at->pts.'-'.$a->pts.'</td>'; 
                                endif;
                            endforeach;
                        endif; 

                      echo '</tr>';
                    endif; 
                endforeach;
                ?>
            </table>
            
            <div class="goals">
                <?php 
                if($match->content->matchFacts->teamForm == null) { echo ''; }
                else {
                $data_home = $match->content->matchFacts->teamForm[0];
                $data_away = $match->content->matchFacts->teamForm[1];
                $ahs = 0;
                $ahc = 0;
                $btts = 0;
                $o15 = 0;
                $o25 = 0;
                $o35 = 0;
                foreach ($data_home as $homeForm) :
                    $h_id = $homeForm->home->id;
                    $a_id = $homeForm->away->id;
                    $score = str_replace(" ","",$homeForm->score);
                    $goal1 = strstr($score, '-', true);
                    $goal2 = substr($score, strlen($score)-1);
                    if(($h_id == $home_id and (int)$goal1 == 0) or ($a_id == $home_id and (int)$goal2 == 0)):
                    $ahs = $ahs + 1;
                    endif;
                    if(($h_id == $home_id and (int)$goal2 == 0) or ($a_id == $home_id and (int)$goal1 == 0)):
                    $ahc = $ahc + 1;
                    endif;
                    if(($h_id == $home_id and ((int)$goal1 >= 1 and (int)$goal2 >= 1)) or ($a_id == $home_id and ((int)$goal1 >= 1 and (int)$goal2 >= 1)) ):
                    $btts = $btts + 1;
                    endif;
                    if(((int)$goal1 + (int)$goal2) >=1.5):
                    $o15 = $o15 + 1;
                    endif;
                    if(((int)$goal1 + (int)$goal2) >=2.5):
                    $o25 = $o25 + 1;
                    endif;
                    if(((int)$goal1 + (int)$goal2) >=3.5):
                    $o35 = $o35 + 1;
                    endif;
                endforeach;

                $aws = 0;
                $awc = 0;
                $abtts = 0;
                $ao15 = 0;
                $ao25 = 0;
                $ao35 = 0;
                foreach ($data_away as $awayForm) :
                    $h_id = $awayForm->home->id;
                    $a_id = $awayForm->away->id;
                    $score = str_replace(" ","",$awayForm->score);
                    $goal1 = strstr($score, '-', true);
                    $goal2 = substr($score, strlen($score)-1);
                    if(($h_id == $away_id and (int)$goal1 == 0) or ($a_id == $away_id and (int)$goal2 == 0)):
                    $aws = $aws + 1;
                    endif;
                    if(($h_id == $away_id and (int)$goal2 == 0) or ($a_id == $away_id and (int)$goal1 == 0)):
                    $awc = $awc + 1;
                    endif;
                    if(($h_id == $away_id and ((int)$goal1 >= 1 and (int)$goal2 >= 1)) or ($a_id == $away_id and ((int)$goal1 >= 1 and (int)$goal2 >= 1)) ):
                    $abtts = $abtts + 1;
                    endif;
                    if(((int)$goal1 + (int)$goal2) >=1.5):
                    $ao15 = $ao15 + 1;
                    endif;
                    if(((int)$goal1 + (int)$goal2) >=2.5):
                    $ao25 = $ao25 + 1;
                    endif;
                    if(((int)$goal1 + (int)$goal2) >=3.5):
                    $ao35 = $ao35 + 1;
                    endif;
                endforeach;
                echo '<div class="goal-stats f r ac">
                      <div class="f-1 ac tr num-stat">'.$ahs.'</div>
                      <div class="spacer f ac jc wide"><span>FTS</span></div> 
                      <div class="f-1 ac tr num-stat">'.$aws.'</div>                     
                      </div>';
                echo '<div class="goal-stats f r ac">
                      <div class="f-1 ac tr num-stat">'.$ahc.'</div>
                      <div class="spacer f ac jc wide"><span>CS</span></div> 
                      <div class="f-1 ac tr num-stat">'.$awc.'</div>                     
                      </div>';
                echo '<div class="goal-stats f r ac">
                      <div class="f-1 ac tr num-stat">'.$btts.'</div>
                      <div class="spacer f ac jc wide"><span>BTTS</span></div> 
                      <div class="f-1 ac tr num-stat">'.$abtts.'</div>                     
                      </div>';
                echo '<div class="goal-stats f r ac">
                      <div class="f-1 ac tr num-stat">'.$o15.'</div>
                      <div class="spacer f ac jc wide"><span>Over 1.5</span></div> 
                      <div class="f-1 ac tr num-stat">'.$ao15.'</div>                     
                      </div>';
                echo '<div class="goal-stats f r ac">
                      <div class="f-1 ac tr num-stat">'.$o25.'</div>
                      <div class="spacer f ac jc wide"><span>Over 2.5</span></div> 
                      <div class="f-1 ac tr num-stat">'.$ao25.'</div>                     
                      </div>';
                echo '<div class="goal-stats f r ac">
                      <div class="f-1 ac tr num-stat">'.$o35.'</div>
                      <div class="spacer f ac jc wide"><span>Over 3.5</span></div> 
                      <div class="f-1 ac tr num-stat">'.$ao35.'</div>                     
                      </div>';
            } ?>                       
            <div class="fixture-summary mt10"> 
                <span><span>BTTS</span><span class="f r f-1 ac">50%</span></span>
                <span><span>O 1.5</span><span class="f r f-1 ac">70%</span></span>
                <span><span>O 2.5</span><span class="f r f-1 ac">50%</span></span>
                <span><span>U 2.5</span><span class="f r f-1 ac">50%</span></span>
                <span><span>O 3.5</span><span class="f r f-1 ac">30%</span></span>
                <span><span>U 3.5</span><span class="f r f-1 ac">70%</span></span>
            </div>
            <div class="form">
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
            <?php  } ?>
                <div class="match-team-stats">
                    <?php
                    if($stats == null) {
                        echo '';
                    } else {
                            echo '<div>';
                        foreach($stats as $stat) {
                            foreach($stat->topThree as $tt) {
                                if ($tt->teamId == $home_id): 
                                        echo 'Ranked '.$tt->rank.' in '.$stat->header.'<br /> ';
                                        echo $tt->name.' - '.$tt->value.'<br /> ';
                                endif;   
                            }
                        }
                            echo '</div>';
                    }
                    if($stats == null) {
                        echo '';
                    } else {
                            echo '<div>';
                        foreach($stats as $stat) {
                            foreach($stat->topThree as $tt) { 
                                if ($tt->teamId == $away_id): 
                                    echo 'Ranked '.$tt->rank.' in '.$stat->header.'<br /> ';
                                        echo $tt->name.' - '.$tt->value.'<br /> ';
                                endif;  
                            }
                        }
                            echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
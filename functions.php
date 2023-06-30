<?php
$api = 'https://www.fotmob.com/api/';

$date = date('Ymd');
function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $_SERVER['REQUEST_URI']
    );
  }
  

function get_matches_by_date() {
    $matches_url = file_get_contents('../matches.json');
    $obj = json_decode($matches_url, false); 
    $matches = $obj->leagues;

    foreach($matches as $match):
        echo '<div class="league">';
        $obj = get_leagues();
        foreach($obj as $key => $v): 
            if ($key == 'international') {
                $int = $obj->international;
                foreach($int as $league): 
                    foreach ($league->leagues as $int):
                    if($match->primaryId == $int->id) : 
                         echo '<div class="league-name"> 
                         <span class="titleBox"><span class="event__title--name">'.$match->name.'</span><span class="event__title--type"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24" xml:space="preserve">

                         <g clip-path="url(#clip0_251_1953)"><path d="M15.421 16.21C15.2118 16.21 15.0025 16.1958 14.7933 16.1747C14.7262 16.1618 14.6632 16.1328 14.6098 16.0902C14.5564 16.0476 14.5141 15.9927 14.4865 15.9303C14.2705 15.1277 14.0613 14.3672 13.8588 13.6278C13.8215 13.5311 13.8193 13.4245 13.8524 13.3264C13.8856 13.2284 13.952 13.145 14.0403 13.0908L15.7983 11.5157C15.8717 11.4517 15.9659 11.4164 16.0634 11.4164C16.1608 11.4164 16.255 11.4517 16.3285 11.5157C16.9183 11.8377 17.4473 12.2603 17.8915 12.7645C17.9922 12.8892 18.0487 13.0438 18.052 13.204C18.0556 14.0818 17.7942 14.9402 17.302 15.667C17.297 15.6873 17.2875 15.7063 17.2743 15.7225C17.1826 15.8471 17.0601 15.9455 16.9188 16.0082C16.4337 16.1487 15.9305 16.217 15.4255 16.2108L15.421 16.21Z" fill="var(--MFFullscreenColorScheme-eventIconColor)"></path><path d="M9.742 14.5075C9.65784 14.5083 9.57626 14.4784 9.5125 14.4235C8.9621 14.0903 8.48294 13.6516 8.1025 13.1328C8.04032 13.045 8.00631 12.9403 8.005 12.8328C8.00467 12.0142 8.22127 11.2101 8.63275 10.5025C8.63808 10.4769 8.65313 10.4543 8.67475 10.4395C8.73687 10.3842 8.81072 10.3437 8.89075 10.321C9.37339 10.1327 9.88692 10.036 10.405 10.036C10.5652 10.022 10.7263 10.022 10.8865 10.036C10.9774 10.0458 11.0623 10.0863 11.127 10.151C11.1917 10.2157 11.2322 10.3006 11.242 10.3915C11.3673 10.936 11.5068 11.494 11.6395 12.052L11.7445 12.502C11.7619 12.5701 11.7608 12.6417 11.7411 12.7093C11.7215 12.7768 11.684 12.8379 11.6328 12.886L10.0075 14.41C9.97368 14.4438 9.93342 14.4705 9.88911 14.4886C9.84481 14.5066 9.79734 14.5156 9.7495 14.515H9.742V14.5075Z" fill="var(--MFFullscreenColorScheme-eventIconColor)"></path><path d="M13 5.5C11.5166 5.5 10.0666 5.93987 8.83323 6.76398C7.59986 7.58809 6.63856 8.75943 6.07091 10.1299C5.50325 11.5003 5.35472 13.0083 5.64411 14.4632C5.9335 15.918 6.64781 17.2544 7.6967 18.3033C8.7456 19.3522 10.082 20.0665 11.5368 20.3559C12.9917 20.6453 14.4997 20.4968 15.8701 19.9291C17.2406 19.3614 18.4119 18.4001 19.236 17.1668C20.0601 15.9334 20.5 14.4834 20.5 13C20.5 11.0109 19.7098 9.10322 18.3033 7.6967C16.8968 6.29018 14.9891 5.5 13 5.5ZM13.0908 18.5673L13.0488 18.4172C13.0344 18.3147 12.9835 18.2207 12.9054 18.1528C12.8272 18.0848 12.7271 18.0474 12.6235 18.0475C11.7633 18.0331 10.9272 17.7609 10.2235 17.266C10.1519 17.2305 10.0732 17.2115 9.99325 17.2105C9.94408 17.2062 9.89453 17.212 9.84769 17.2276C9.80086 17.2432 9.75774 17.2683 9.721 17.3012L9.21175 17.7828C8.23992 17.017 7.52432 15.9734 7.16018 14.7909C6.79604 13.6084 6.80062 12.3431 7.17332 11.1633C7.54602 9.98343 8.26916 8.94507 9.24652 8.18635C10.2239 7.42764 11.4091 6.98453 12.6445 6.916L12.7195 7.18075C12.7695 7.32725 12.8113 7.47375 12.8448 7.62025C12.868 7.68829 12.9065 7.75011 12.9573 7.80095C13.0081 7.85179 13.07 7.89029 13.138 7.9135H13.201C14.0367 8.03978 14.8483 8.29268 15.6078 8.6635C15.6611 8.69269 15.722 8.70498 15.7825 8.69875C15.8657 8.69937 15.9476 8.67761 16.0195 8.63575L16.7035 8.15425C17.7033 8.913 18.4441 9.96223 18.8246 11.1583C19.205 12.3543 19.2065 13.6387 18.8288 14.8356C18.4511 16.0326 17.7126 17.0835 16.7146 17.8445C15.7166 18.6056 14.5077 19.0395 13.2535 19.087L13.0908 18.5673Z" fill="var(--MFFullscreenColorScheme-eventIconColor)"></path></g>
                         </svg>'.$league->name.'</span></span>
                         </div>';
                           
                    endif;
                endforeach; 
                endforeach;
            } 
            if ($key == 'countries') {
                $countries = $obj->countries;
                foreach($countries as $league): 
                    foreach ($league->leagues as $country):
                    if($match->primaryId == $country->id) : 
                        $flags = get_flags();
                        foreach($flags as $flag):
                            if($flag->name == $league->name) : 
                         echo '<div class="league-name"><span class="titleBox"><span class="event__title--name">'.$match->name.'</span><span class="event__title--type"><img class="flag" src="'.$flag->image.'"/>'.$league->name.'</span></span>
                         </div>';
                            endif;
                        endforeach;
                    endif;
                endforeach; 
                endforeach;
            } 
        endforeach;
        foreach ($match->matches as $match):
            $time = $match->time;
            $home = $match->home->name;
            $away = $match->away->name;
            $score1 = $match->home->score;
            $score2 = $match->away->score;
            if (($pos = strpos($time, " ")) !== FALSE) { 
                $time = substr($time, $pos+1); 
            }
            $day = $match->time;
            if (($pos = strpos($day, " ")) !== FALSE) { 
                $day = strtok($day, " "); 
                $day = date_create($day);
                $day = date_format($day,"d M");
            }
            echo '<div class="fixture">';
            echo '<a class="grid item-link" data-toggle="modal" data-id="'.$match->id.'" data-target="#lab-slide-bottom-popup">';
            echo '<div>'.$home.'</div>';
            echo '<div class="fc">';
            if ($match->status->finished == false) : 
                echo '<span class="time">'.$time.'</span>';
            elseif ($match->status->finished == true and $match->status->reason->short == 'PP') : 
                echo '<span>PP</span>';
            elseif ($match->status->finished == true and $match->status->reason->short == 'Can') : 
                echo '<span>Canc.</span>';
            elseif ($match->status->finished == true) : 
                echo '<span class="score">
                <span '.(($score1 > $score2)?'class="winner"':"").'">'.$score1.'</span>
                <span '.(($score1 < $score2)?'class="winner"':"").'">'.$score2.'</span></span><span><small>FT</small></span>';
            endif;
            echo '</div>';
            echo '<div>'.$away.'</div>';
            echo '</a>';
            echo '</div>';
        endforeach;
        echo '</div>';
        endforeach;
}

function get_live_matches_by_date() {
    global $api, $date;
    $matches_url = $api.'matches?date='.$date;
    $obj = json_decode($matches_url);
    $matches = $obj->general;

    foreach($matches as $match):
        echo $match->name;
        endforeach;
} 


function get_match_details($match_id) {
    global $api;
    $match_url = file_get_contents($api.'matchDetails?matchId='.$match_id);
    $obj = json_decode($match_url);
    return $obj;
} 

function get_league_details($league_id) {
    global $api;
    $league_url = file_get_contents($api.'leagues?id='.$league_id);
    $obj = json_decode($league_url);
    return $obj;
}

function get_match_info($match_id) {

} 
function get_match_momentum($match_id) {

} 
function get_match_team_stats() {

}
function get_leagues() {
    global $api;
    $leagues_url = file_get_contents($api.'allLeagues');
    $obj = json_decode($leagues_url);
    return $obj;
}

function get_flags() {
    $flag_url = file_get_contents('../flags.json');
    $flags = json_decode($flag_url);
    return $flags;
}

function get_details_flags() {
    $flag_url = file_get_contents('flags.json');
    $flags = json_decode($flag_url);
    return $flags;
}

 
function ordinal($num)
{

  $last=substr($num,-1);
    if( $last>3  or $last==0 or ( $num >= 11 and $num <= 19 ) ): $ext='th'; 
    elseif( $last==3 ): $ext='rd'; 
    elseif( $last==2 ): $ext='nd'; 
else:
        $ext='st';

    endif;


  return $num.$ext;

}

function logo() {
    $logo = '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 42.976 42.9758" style="enable-background:new 0 0 42.976 42.9758;" xml:space="preserve">
<g>
   <path style="fill:#00FFB6;" d="M18.6789,14.1836c-0.1865,0.8513-0.3633,1.6583-0.5474,2.4985
       c-2.3553-0.4073-4.6733-0.8082-7.0262-1.2152c-0.1008-1.9491-0.2001-3.8708-0.3018-5.8371
       c-0.5415,0.0864-1.051,0.1678-1.6121,0.2574c0-1.0771-0.0083-2.1081,0.0137-3.1383c0.0021-0.0965,0.1846-0.206,0.3017-0.2804
       c1.0062-0.639,2.1072-0.5684,3.2176-0.4175c0.0153,0.0021,0.0308,0.0067,0.0459,0.0057c0.7088-0.0474,1.1399,0.2751,1.5651,0.8643
       c1.4076,1.9505,3.7074,2.1257,5.4638,0.5203c0.15-0.1371,0.4447-0.221,0.6418-0.1808c0.5109,0.1042,1.0518,0.2116,1.4915,0.4696
       c0.3827,0.2246,0.6436,0.6568,1.0275,1.0721c-0.6288,0.1975-1.1351,0.3582-1.6426,0.5154
       c-0.2943,0.0911-0.6028,0.1479-0.8834,0.2696c-1.0762,0.467-2.1148,0.5115-3.2357,0.0448
       c-1.0004-0.4165-2.0423,0.1605-2.3873,1.1469c-0.3291,0.9409,0.1502,2.0021,1.1226,2.3921
       C16.8187,13.5258,17.723,13.8332,18.6789,14.1836z"/>
   <path style="fill:#00FFB6;" d="M39.3056,19.1284c-2.0297,0.0051-3.672-1.6445-3.6662-3.6826
       c0.0058-2.0157,1.6314-3.6545,3.6396-3.6691c2.0208-0.0147,3.6899,1.6397,3.697,3.6645
       C42.9831,17.471,41.3383,19.1233,39.3056,19.1284z"/>
   <path style="fill:#00FFB6;" d="M19.5818,19.2956c-0.7292,0.9815-1.4352,1.9314-2.1406,2.8817
       c-0.3216,0.4333-0.6289,0.8783-0.9713,1.2944c-0.0967,0.1175-0.3086,0.2349-0.4435,0.2117
       c-1.3377-0.2308-2.6641-0.5189-3.8757-1.1649c-0.8344-0.4449-1.5915-0.9882-1.7539-2.0106
       c-0.137-0.8627,0.0948-1.6835,0.4019-2.4817c0.1269-0.3298,0.2797-0.6496,0.441-1.0206c0.8603,0.1432,1.723,0.283,2.5843,0.431
       c1.1995,0.206,2.3992,0.4111,3.5949,0.6375c0.1331,0.0252,0.2408,0.186,0.3597,0.2846c0.0995,0.0824,0.1864,0.1902,0.2992,0.2446
       C18.5617,18.8364,19.053,19.0539,19.5818,19.2956z"/>
   <path style="fill:#00FFB6;" d="M20.0033,3.1502c-0.0514,1.1879-0.339,2.1958-1.0691,3.036c-1.0053,1.1571-2.425,1.147-3.367-0.0623
       c-0.9899-1.2709-1.209-2.7168-0.71-4.2374c0.4075-1.2419,1.4979-1.9724,2.6626-1.8784c1.161,0.0937,2.1344,1.0546,2.3833,2.3654
       C19.9575,2.6601,19.9786,2.9532,20.0033,3.1502z"/>
   <path style="fill:#00FFB6;" d="M8.653,38.7362c-0.8403-0.4841-1.0532-1.2497-1.1477-2.0899
       c-0.0751-0.6685,0.0572-1.2305,0.4807-1.7977c0.8781-1.1761,1.6817-2.4048,3.0002-3.1557c0.0661-0.0377,0.131-0.0775,0.1436-0.0849
       c0.9789,0.9674,1.939,1.9163,2.9456,2.9111C12.302,35.8983,10.4843,37.3119,8.653,38.7362z"/>
   <path style="fill:#00FFB6;" d="M25.4715,22.6741c1.3773,1.1142,2.7341,2.1998,4.0752,3.3044
       c0.3554,0.2927,0.3757,1.6377,0.0149,2.0459c-0.2487,0.2814-0.5859,0.4877-0.8976,0.7077
       c-0.0693,0.0489-0.2098,0.0466-0.2967,0.0133c-1.888-0.7233-3.7425-1.5103-5.287-2.8676
       c-0.0922-0.0811-0.1882-0.1579-0.2979-0.2496C23.6911,24.6299,24.5699,23.6645,25.4715,22.6741z"/>
   <path style="fill:#00FFB6;" d="M7.6875,7.2249c0,1.0122,0,1.9485,0,2.8802c-0.9602,0.3851-1.9084,0.2509-2.8655,0.0657
       C3.629,9.94,2.4299,9.7403,1.2337,9.5258C0.3986,9.376-0.0953,8.7836,0.0154,8.0679c0.1124-0.7274,0.7352-1.152,1.5817-1.0401
       C3.031,7.2173,4.46,7.4466,5.896,7.6171c0.3603,0.0427,0.7437-0.0544,1.1088-0.1263C7.2243,7.4476,7.4289,7.3288,7.6875,7.2249z"/>
   <path style="fill:#00FFB6;" d="M15.3335,33.5024c-0.8866-0.8807-1.7709-1.7591-2.5894-2.5722c0-0.3048,0.0302-0.548-0.0054-0.7811
       c-0.1299-0.8498-0.2818-1.6963-0.4389-2.6234c1.6232,0.2397,3.1946,0.4718,4.818,0.7115c-0.1674,1.0975-0.3288,2.156-0.4906,3.2144
       c-0.0093,0.0609-0.0241,0.1209-0.033,0.1818C16.4179,32.8374,16.4039,32.8582,15.3335,33.5024z"/>
   <path style="fill:#00FFB6;" d="M21.2903,10.8747c0.7463-0.2299,1.4766-0.4663,2.2157-0.6709
       c0.1178-0.0326,0.3319,0.0345,0.4045,0.1295c0.3179,0.4159,0.6188,0.8478,0.8907,1.2952c0.388,0.6384,0.4097,1.3151,0.0982,1.9923
       c-0.3042,0.6613-0.8795,0.9139-1.5663,0.6675c-2.2472-0.8061-4.4895-1.6257-6.7345-2.4378
       c-0.2784-0.1007-0.4822-0.266-0.3769-0.5813c0.11-0.3292,0.3891-0.3015,0.657-0.2149c1.2166,0.3931,2.4338,0.7842,3.6469,1.188
       c0.3914,0.1303,0.7397,0.1212,0.9874-0.2424c0.2473-0.363,0.1622-0.6993-0.1483-0.9924
       C21.3343,10.9786,21.3212,10.9313,21.2903,10.8747z"/>
   <path style="fill:#00FFB6;" d="M24.2988,21.7598c-0.849,0.9312-1.6666,1.828-2.3935,2.6253
       c-0.381-0.0953-0.6541-0.205-0.9338-0.2261c-0.9666-0.0728-1.9355-0.1147-3.0211-0.1749c1.0357-1.3959,2.0125-2.7124,3.0194-4.0694
       C22.0884,20.504,23.3518,20.7842,24.2988,21.7598z"/>
   <path style="fill:#00FFB6;" d="M29.7174,29.8628c0.1048-0.0802,0.1869-0.1493,0.2751-0.2095
       c1.0413-0.7103,1.4182-1.7158,1.2585-2.9311c-0.0464-0.3528,0.0289-0.5636,0.3277-0.7652
       c0.5621-0.3793,1.0895-0.8096,1.6378-1.2099c0.5435-0.3967,1.1048-0.3784,1.5101,0.0352c0.3862,0.3941,0.423,0.9541,0.0288,1.4735
       c-0.839,1.1054-1.6995,2.1947-2.5663,3.2786c-0.2104,0.2631-0.4663,0.495-0.7242,0.7142
       C30.716,30.8849,30.2332,30.7835,29.7174,29.8628z"/>
   <path style="fill:#00FFB6;" d="M5.9903,36.5384c0.0297,0.1849,0.0658,0.335,0.0764,0.4869
       c0.0959,1.3727,0.8165,2.3556,1.9151,3.1139c0.4849,0.3347,0.8232,1.5949,0.5894,2.138c-0.1729,0.4016-0.4868,0.6363-0.9166,0.6881
       c-0.4523,0.0546-0.8635-0.1015-1.0687-0.5c-0.777-1.5089-1.5005-3.0458-1.7358-4.7511C4.744,36.9455,5.1166,36.5789,5.9903,36.5384
       z"/>
   <path style="fill:#00FFB6;" d="M17.3495,26.7708c-1.7492-0.2575-3.4224-0.5009-5.0936-0.7578
       c-0.0898-0.0138-0.2166-0.13-0.2339-0.2169c-0.1161-0.5835-0.2072-1.172-0.3179-1.8268c1.8841,0.8544,3.8187,1.1849,5.8357,1.4439
       C17.4763,25.8663,17.4158,26.2978,17.3495,26.7708z"/>
</g>
</svg>';

return $logo;
}
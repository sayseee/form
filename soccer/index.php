<?php

require_once '../functions.php';

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#00141e" />
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/layout.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="HeaderContainer">
            <div class="HeaderTopBar">
            <?php echo logo();?>
                <div class="dates">
                    <span>
                        <?php $NewDate=Date('D', strtotime('-2 days'));echo($NewDate);?>
                        <span><?php $NewDate=Date('d.m', strtotime('+2 days'));echo($NewDate);?></span>
                    </span>
                    <span>
                        <?php $NewDate=Date('D', strtotime('-1 days'));echo($NewDate);?>
                        <span><?php $NewDate=Date('d.m.', strtotime('-1 days'));echo($NewDate);?></span>
                    </span>
                    <span class="active">
                        Today
                        <span><?php $NewDate=Date('d.m');echo($NewDate);?></span>
                    </span>
                    <span>
                        <?php $NewDate=Date('D', strtotime('+1 days'));echo($NewDate);?>
                        <span><?php $NewDate=Date('d.m', strtotime('+1 days'));echo($NewDate);?></span>
                    </span>
                    <span>
                        <?php $NewDate=Date('D', strtotime('+2 days'));echo($NewDate);?>
                        <span><?php $NewDate=Date('d.m', strtotime('+2 days'));echo($NewDate);?></span>
                    </span>
                </div>
            </div>
        </div>
    <div class="wrap">
        <div class="match-content-data">
            <?php echo get_matches_by_date();?>
        </div>
        <div div class="right-side d-none d-sm-block d-sm-none d-md-block">
            <div id="sideDetails">
            left content
            </div>
        </div>
    </div>
        <script src="" async defer></script>
        <div class="MobileFooter">
            <div>
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="29.0112px" height="23.0702px" viewBox="0 0 29.0112 23.0702" style="enable-background:new 0 0 29.0112 23.0702;"
                xml:space="preserve">
           <path style="fill:none;" d="M14.0054,15.8075c-2.1589-0.2515-3.8462-2.0699-3.8462-4.2952s1.6873-4.0441,3.8462-4.2957V2.6045H1
               v5.4357h4.9585v6.9438H1v5.4359h13.0054V15.8075z"/>
           <path style="fill:none;" d="M15.0054,7.2167c2.1592,0.2515,3.8462,2.0704,3.8462,4.2957s-1.687,4.0437-3.8462,4.2952v4.6124h13.0054
               V14.984h-4.958V8.0402h4.958V2.6045H15.0054V7.2167z"/>
           <path style="fill:none;" d="M11.1592,11.5123c0,1.6736,1.2392,3.0515,2.8462,3.2952V8.2167
               C12.3984,8.4603,11.1592,9.8383,11.1592,11.5123z"/>
           <rect x="1" y="9.0402" style="fill:none;" width="3.9585" height="4.9438"/>
           <path style="fill:none;" d="M17.8516,11.5123c0-1.674-1.2392-3.052-2.8462-3.2957v6.5908
               C16.6124,14.5639,17.8516,13.1859,17.8516,11.5123z"/>
           <rect x="24.0527" y="9.0402" style="fill:none;" width="3.958" height="4.9438"/>
           <path fill="#001e28" d="M28.0107,1.6045H15.0054h-1H1H0v1v17.8154v1h1h13.0054h1h13.0054h1v-1V2.6045v-1H28.0107z M15.0054,8.2167
               c1.607,0.2437,2.8462,1.6216,2.8462,3.2957c0,1.6736-1.2392,3.0515-2.8462,3.2952V8.2167z M1,9.0402h3.9585v4.9438H1V9.0402z
                M1,20.4199V14.984h4.9585V8.0402H1V2.6045h13.0054v4.6122c-2.1589,0.2516-3.8462,2.0704-3.8462,4.2957s1.6873,4.0436,3.8462,4.2952
               v4.6124H1z M14.0054,14.8075c-1.607-0.2437-2.8462-1.6216-2.8462-3.2952c0-1.674,1.2392-3.052,2.8462-3.2957V14.8075z
                M28.0107,13.984h-3.958V9.0402h3.958V13.984z M28.0107,8.0402h-4.958v6.9438h4.958v5.4359H15.0054v-4.6124
               c2.1592-0.2515,3.8462-2.0699,3.8462-4.2952s-1.687-4.0441-3.8462-4.2957V2.6045h13.0054V8.0402z"/>
           </svg>
                <span>All Games</span>
            </div>
            <div>
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 28.0112 22.0702" style="enable-background:new 0 0 28.0112 22.0702;" xml:space="preserve">
           <g>
               <path fill="#001e28" d="M14.0065,14.4455c-1.8489,0-3.3546-1.5856-3.3546-3.535s1.5058-3.536,3.3546-3.536s3.3528,1.5867,3.3528,3.536
                   S15.8554,14.4455,14.0065,14.4455z"/>
           </g>
           <path fill="#001e28" d="M7.2582,10.9104c0-2.5927,1.56-4.7925,3.7364-5.6561l-0.9355-0.9863c-2.3688,1.1732-4.017,3.7056-4.017,6.6424
               c0,2.9367,1.6482,5.4688,4.0169,6.6419l0.9355-0.9863C8.8182,15.7023,7.2582,13.5025,7.2582,10.9104z"/>
           <path fill="#001e28" d="M20.753,10.9104c0,2.5923-1.5601,4.7921-3.7362,5.6557l0.9357,0.9866c2.3688-1.173,4.0166-3.7053,4.0166-6.6422
               c0-2.937-1.6479-5.4697-4.0167-6.6427l-0.9356,0.9865C19.1929,6.1175,20.753,8.3175,20.753,10.9104z"/>
           <path fill="#001e28" d="M2.9579,10.9104c0-3.5364,1.8388-6.6227,4.5572-8.2704l-0.884-0.932c-2.928,1.9083-4.8893,5.3139-4.8893,9.2024
               c0,3.8881,1.9613,7.2936,4.8893,9.2018l0.8839-0.9319C4.7968,17.5328,2.9579,14.4467,2.9579,10.9104z"/>
           <path fill="#001e28" d="M25.0533,10.9104c0,3.5365-1.8385,6.6228-4.5568,8.2703l0.8837,0.9317c2.9277-1.9082,4.8892-5.3137,4.8892-9.202
               c0-3.8886-1.9615-7.2942-4.8892-9.2025l-0.8838,0.9317C23.2147,4.2871,25.0533,7.3738,25.0533,10.9104z"/>
           </svg>
                <span>Live</span>
            </div>
            <div>
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 28.0112 22.0702" style="enable-background:new 0 0 28.0112 22.0702;" xml:space="preserve">
           <g>
               <g>
                   <path fill="#001e28" d="M13.2528,19.243c-3.041,0-5.5156-2.4746-5.5156-5.5156s2.4746-5.5156,5.5156-5.5156s5.5156,2.4746,5.5156,5.5156
                       S16.2938,19.243,13.2528,19.243z M13.2528,9.2117c-2.4902,0-4.5156,2.0254-4.5156,4.5156s2.0254,4.5156,4.5156,4.5156
                       s4.5156-2.0254,4.5156-4.5156S15.743,9.2117,13.2528,9.2117z"/>
               </g>
               <g>
                   <g>
                       <polygon points="14.7319,15.9133 12.7524,13.9348 12.7524,11.3098 13.7524,11.3098 13.7524,13.5207 15.4389,15.2063 			"/>
                   </g>
               </g>
           </g>
           <path fill="#001e28" d="M20.1162,2.5493V0.5717h-1v1.9775H8.1894V0.5717h-1v1.9775H0.1323v18.9492h27.7466V2.5493H20.1162z M26.8789,3.5493v2.4385
               H1.1323V3.5493H26.8789z M1.1323,20.4985V6.9877h25.7466v13.5107H1.1323z"/>
           </svg>
           
                <span>Scheduled</span>
            </div>
            <div>
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                width="28.0112px" height="22.0702px" viewBox="0 0 28.0112 22.0702" style="enable-background:new 0 0 28.0112 22.0702;"
                xml:space="preserve">
           <rect x="13.0759" y="10.052" width="1.9719" height="1.9719"/>
           <rect x="13.0759" y="14.0463" width="1.9719" height="1.9719"/>
           <path fill="#001e28" d="M8.9,17.3476H7.2531v-6.2051c-0.6089,0.5669-1.335,0.993-2.1269,1.2481v-1.4942c0.5087-0.1852,0.9822-0.4557,1.4-0.8
               c0.4709-0.3485,0.831-0.8256,1.0371-1.374H8.9V17.3476z"/>
           <path fill="#001e28" d="M20.4138,8.6494c0.7559-0.0351,1.4824,0.2965,1.9511,0.8906c0.6505,1.0446,0.9445,2.272,0.8379,3.498
               c0.1052,1.2285-0.1908,2.4579-0.8437,3.5039c-0.4696,0.5885-1.1933,0.9155-1.9453,0.8789
               c-0.7895,0.0221-1.5416-0.3364-2.0215-0.9638c-0.6123-1.0358-0.881-2.2388-0.7676-3.4366
               c-0.1044-1.2247,0.1917-2.4502,0.8437-3.4921C18.938,8.9398,19.6618,8.6128,20.4138,8.6494z M20.4138,10.0146
               c-0.1946-0.0017-0.3835,0.0656-0.5332,0.19c-0.1887,0.1846-0.3156,0.423-0.3633,0.6826c-0.1388,0.7078-0.1959,1.4292-0.17,2.15
               c-0.0267,0.6962,0.0245,1.3932,0.1527,2.078c0.051,0.2833,0.1845,0.5452,0.3838,0.7529c0.3104,0.2511,0.7544,0.2499,1.0635-0.0029
               c0.1886-0.1846,0.3155-0.423,0.3632-0.6826c0.1392-0.7059,0.1962-1.4256,0.17-2.1446c0.0268-0.6959-0.0243-1.3926-0.1524-2.0771
               c-0.0515-0.284-0.1849-0.5467-0.3838-0.7559C20.7959,10.0802,20.6077,10.0126,20.4138,10.0146z"/>
           <path fill="#001e28" d="M25.5251,4.1408V0h-1v4.1408H3.5646V0h-1v4.1408H0.239v17.685h27.4941V4.1408H25.5251z M26.7331,20.8258H1.239V5.1408
               h25.4941V20.8258z"/>
           </svg>
                <span>Results</span>
            </div>
        </div>
    <!-- MODAL CONTENT SAMPLE STARTS HERE -->
    <div class="modal fade hidden-lg hidden-md" id="lab-slide-bottom-popup" data-keyboard="false" data-backdrop="false">
        <div class="lab-modal-body">
        <div id="gameDetails">
            
        </div>
        </div>
    </div>
    <script>

$(document).ready(function() { 
    $("a.item-links").click(function(e) {  
        e.preventDefault();
        $("#sideDetails").html('<div class="loader"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><style>.spinner_6KQt{animation:spinner_4IqM 1.2s cubic-bezier(0.52,.6,.25,.99) infinite}@keyframes spinner_4IqM{0%{transform:translate(12px,12px) scale(0);opacity:1}100%{transform:translate(0,0) scale(1);opacity:0}}</style><path class="spinner_6KQt" d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9,9,0,0,1,12,21Z" transform="translate(12, 12) scale(0)"/></svg></div>');
        $.ajax({ 
        type: 'POST',
        url: "../side-details.php?id=" + e.currentTarget.dataset.id, 
        success: function(data) {
            $("#sideDetails").html(data);
        }
        });

    });
});

$(document).ready(function() { 
    $("a.item-link").click(function(e) {  
        e.preventDefault();
        $("#gameDetails").html('<div class="loader"><svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><style>.spinner_6KQt{animation:spinner_4IqM 1.2s cubic-bezier(0.52,.6,.25,.99) infinite}@keyframes spinner_4IqM{0%{transform:translate(12px,12px) scale(0);opacity:1}100%{transform:translate(0,0) scale(1);opacity:0}}</style><path class="spinner_6KQt" d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9,9,0,0,1,12,21Z" transform="translate(12, 12) scale(0)"/></svg></div>');
        $.ajax({ 
        type: 'POST',
        url: "../details.php?id=" + e.currentTarget.dataset.id, 
        success: function(data) {
            $('#lab-slide-bottom-popup').modal('show');
            $("#gameDetails").html(data);
        }
        });

    });
});
    </script>
</body>
</html>
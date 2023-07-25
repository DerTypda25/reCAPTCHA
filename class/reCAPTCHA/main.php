<?php 
if(!isset($_COOKIE['solved'])){
    echo '<script>
    var d = new Date();
    d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));        
    document.cookie="solved=false; expires=" +d.toUTCString()+ ";path=/";</script>';
}

?>
<div class="MO_captcha MO_captcha-banner<?php echo (isset($_COOKIE['solved']) && $_COOKIE['solved'] != 'false')? " success" : ""; ?>">
    <label class="ohnohoney" for="name"></label>
    <input class="ohnohoney honey1" autocomplete="off" type="text" id="2451351531sdfsdf" name="2451351531sdfsdf" placeholder="Your name here" value="">
    <label class="ohnohoney" for="email"></label>
    <input class="ohnohoney honey2" autocomplete="off" type="email" id="6546sdf165s4df" name="6546sdf165s4df" placeholder="Your e-mail here" value="">
    <div class="MO_captcha-content">
        <div class="MO_upper-row">
            <img src="<?php echo get_stylesheet_directory_uri(  ); ?>/include/class/reCAPTCHA/captcha.php" alt="CAPTCHA" class="MO_captcha-image">
            <img src="<?php echo get_stylesheet_directory_uri(  ); ?>/include/class/reCAPTCHA/media/refresh.png" alt="refresh" class="MO_refresh-captcha">
            <img src="<?php echo get_stylesheet_directory_uri(  ); ?>/include/class/reCAPTCHA/media/information-button.png" alt="info" class="MO_info">
            <p class="MO_infotext">Um den Missbrauch des Kontaktformulars zu verhindern, bitte den Zifferncode zur Bestätigung eingeben.</p>
        </div>
        <div class="MO_lower-row">
            <input <?php echo (isset($_COOKIE['solved']) && $_COOKIE['solved'] != 'false')? "" : "required"; ?> type="text" id="" class="MO_input-field MO_captcha_inputfield" name="captcha_challenge" placeholder="Bitte tippe die Buchstaben ein" value="<?php echo (isset($_COOKIE['solved']) && $_COOKIE['solved'] != 'false' && isset($_COOKIE['captcha']))? $_COOKIE['captcha'] : ""; ?>">
            <span class="MO_submit-captcha MO_captcha-submitbutton">Prüfen</span>
        </div>
    </div>
    <div class="MO_captcha-finish">
        <div class="MO_spacer">
            <img src="<?php echo get_stylesheet_directory_uri(  ); ?>/include/class/reCAPTCHA/media/check-mark.png" alt="checkmark" class="MO_finish_check">
            <p class="MO_finish_text">I'm not a robot</p>
            <img src="<?php echo get_stylesheet_directory_uri(  ); ?>/include/class/reCAPTCHA/media/dizzy-robot.png" alt="robot" class="MO_finish_robot">
        </div>
    </div>
</div>
<style>

.ohnohoney{opacity: 0;position: absolute;top: 0;left: 0;height: 0;width: 0;z-index: -1;}
.MO_captcha{width: fit-content;padding: 10px;border-radius: 10px;background-color: #eee;min-width: 322px;min-height: 107px}
.MO_captcha .MO_captcha-finish{display:none;}
.MO_captcha .MO_captcha-content{display: flex;flex-direction: column;}
.MO_captcha .MO_captcha-content .MO_upper-row{display: flex;flex-direction: row;margin-bottom: .7rem;position: relative;align-items: center;}
.MO_captcha .MO_captcha-content .MO_lower-row{display: flex;flex-direction: row;}
.MO_captcha .MO_captcha-content .MO_upper-row .MO_refresh-captcha{width: 24px;height: 24px;margin-left: 4px;margin-top: 10px;}
.MO_captcha .MO_captcha-content .MO_upper-row .MO_refresh-captcha:hover{cursor: pointer;}
.MO_captcha .MO_captcha-content .MO_upper-row .MO_info{width: 15px;height: 15px;position: absolute;top: -3px;right: -3px;}
.MO_captcha .MO_captcha-content .MO_upper-row .MO_info:hover{cursor: pointer;}
.MO_captcha .MO_captcha-content .MO_upper-row .MO_info:hover ~ .MO_infotext{display: block;}
.MO_captcha .MO_captcha-content .MO_upper-row .MO_infotext:hover{display: block;}
.MO_captcha .MO_captcha-content .MO_upper-row .MO_infotext.active{display: block;}
.MO_captcha .MO_captcha-content .MO_upper-row .MO_infotext{position: absolute;display: none;bottom: 60%;left: 100%;width: 100%;background-color: #eee;padding: 10px;z-index: 20;}

.MO_captcha .MO_captcha-content .MO_lower-row .MO_input-field.incorrect{border: 1px solid red;}
.MO_captcha .MO_captcha-content .MO_lower-row .MO_input-field{min-height: 35px;padding: 3px 10px;width: 200px;height: 100%;border: none;font-size: .75em;margin: 0;}
.MO_captcha .MO_captcha-content .MO_lower-row .MO_submit-captcha{color: #fff;background-color: #646464;padding: 2px 15px;display: flex;align-items: center;justify-content: center;margin-left: 10px;}
.MO_captcha .MO_captcha-content .MO_lower-row .MO_submit-captcha:hover{cursor: pointer;}
.MO_captcha.success .MO_captcha-content{display:none;}
.MO_captcha.success .MO_captcha-finish{display: flex;}
.MO_captcha.success .MO_captcha-finish .MO_spacer{display: flex;flex-direction: row;align-items: center;width: 100%;height: 100%;justify-content:center;}
.MO_captcha.success .MO_captcha-finish .MO_finish_check{width: 30px;height: 30px;}
.MO_captcha.success .MO_captcha-finish .MO_finish_text{font-size: 1.4rem;margin: 0 10px;color: #868686;}
.MO_captcha.success .MO_captcha-finish .MO_finish_robot{width: 60px;height: 60px;margin-bottom: 18px;-webkit-transform: scaleX(-1);transform: scaleX(-1);}
</style>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/include/class/jquery.md5.js'; ?>"></script>
<script type="text/javascript">
    var solved = document.cookie
                    .split('; ')
                    .find(row => row.startsWith('solved='))
                    .split('=')[1];
                    console.log(solved);
    if(document.cookie.indexOf(`captcha_attempts=`) === -1){
        var d = new Date();
        d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
        document.cookie = 'captcha_attempts=0; expires=' +d.toUTCString()+ '; path=/';
    }

    // refresh captcha
    $(document).on('click','.MO_refresh-captcha',function(){
        $('.MO_captcha-image').attr('src','<?php echo get_stylesheet_directory_uri(); ?>/include/class/reCAPTCHA/captcha.php?ref=true' + Date.now());
    });

    // submit captcha / form
    $("form.ajaxForm").submit(submitButtonsonclick);
    $(".MO_input-field").on("keydown", function(e) { if (e.code === "Enter") submitButtonsonclick(e);});
    $(document).on('click','form.ajaxForm button[type="submit"]',submitButtonsonclick);
    $(document).on('click','.MO_submit-captcha',submitButtonsonclick);


    function submitButtonsonclick(e) {
        
        // get CAPTCHA values
        var values = $(".MO_captcha_inputfield");

        // get honeypot values
        var valuehoney1s = $(".honey1");
        var valuehoney2s = $(".honey2");

        // check if cookies exist and get the value from the cookie
        var captchaCookie = document.cookie
            .split('; ')
            .find(row => row.startsWith('captcha='));
        if (captchaCookie) {
            var captcha = captchaCookie.split('=')[1];
        }
        var attemptsCookie = document.cookie
            .split('; ')
            .find(row => row.startsWith('captcha_attempts='));
        if (attemptsCookie) {
            var attempts = attemptsCookie.split('=')[1];
        }

        // create new date Object
        var d = new Date();

        // set attempts cookie to expire in 7 days
        d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));          
        document.cookie = 'captcha_attempts='+(parseInt(attempts)+1)+'; expires=' +d.toUTCString()+ '; path=/';

        // check if one of possible multiple captcha fields is correct
        for (var i = 0; i < values.length; i++) {
            // check if captcha is correct and honeypots are empty
            if(captcha == $.md5(values[i].value.toUpperCase()) && valuehoney2s[i].value == "" && valuehoney1s[i].value == ""){
                // set frontend cookie to true
                $(".MO_captcha-banner").addClass("success");
                var d = new Date();
                // set cookie to expire in X days depending on attempts
                if(attempts == 0){
                    d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
                }
                else if(attempts >= 3){
                    d.setTime(d.getTime() + (12 * 60 * 60 * 1000));
                }
                else{
                    d.setTime(d.getTime() + ((7-attempts*3) * 24 * 60 * 60 * 1000));
                }
                // set cookie to true and expire in X days depending on attempts
                document.cookie = 'solved=true; expires=' +d.toUTCString()+ '; path=/';     
                // set attempts cookie to expire in X days depending on attempts
                document.cookie = 'captcha_attempts='+(parseInt(attempts)-1)+'; expires=' +d.toUTCString()+ '; path=/';
                
            }
            else{       
                // set frontend cookie to false
                $(values[i]).addClass("incorrect");
            }
        }
    }

</script>
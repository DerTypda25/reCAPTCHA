<form id="<!-- Indivieduelle ID -->" class="ajaxForm">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p>Alle Inputfelder als Beispiel</p> 
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>
                    <label>Text
                        <input id="pix_text" name="pix_text" placeholder="Text" type="text"  value="<?php echo (isset($_POST["pix_text"]))? $_POST["pix_text"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>E-Mail
                        <input id="pix_email" name="pix_email" placeholder="E-Mail" type="mail"  value="<?php echo (isset($_POST["pix_email"]))? $_POST["pix_email"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Telefon
                        <input id="pix_tel" name="pix_tel" placeholder="Telefon" type="tel"  value="<?php echo (isset($_POST["pix_tel"]))? $_POST["pix_tel"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>URL
                        <input id="pix_url" name="pix_url" placeholder="URL" type="url"  value="<?php echo (isset($_POST["pix_url"]))? $_POST["pix_url"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Zahl
                        <input id="pix_number" name="pix_number" placeholder="Zahl" type="number"  value="<?php echo (isset($_POST["pix_number"]))? $_POST["pix_number"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Datum
                        <input id="pix_date" name="pix_date" placeholder="Datum" type="date"  value="<?php echo (isset($_POST["pix_date"]))? $_POST["pix_date"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Zeit
                        <input id="pix_time" name="pix_time" placeholder="Zeit" type="time"  value="<?php echo (isset($_POST["pix_time"]))? $_POST["pix_time"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Farbe
                        <input id="pix_color" name="pix_color" placeholder="Farbe" type="color"  value="<?php echo (isset($_POST["pix_color"]))? $_POST["pix_color"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Bereich
                        <input id="pix_range" name="pix_range" placeholder="Bereich" type="range"  value="<?php echo (isset($_POST["pix_range"]))? $_POST["pix_range"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Checkbox
                        <input id="pix_checkbox" name="pix_checkbox" placeholder="Checkbox" type="checkbox"  value="<?php echo (isset($_POST["pix_checkbox"]))? $_POST["pix_checkbox"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Radio
                        <input id="pix_radio" name="pix_radio" placeholder="Radio" type="radio"  value="<?php echo (isset($_POST["pix_radio"]))? $_POST["pix_radio"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Datei
                        <input id="pix_file" name="pix_file" placeholder="Datei" type="file"  value="<?php echo (isset($_POST["pix_file"]))? $_POST["pix_file"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Passwort
                        <input id="pix_password" name="pix_password" placeholder="Passwort" type="password"  value="<?php echo (isset($_POST["pix_password"]))? $_POST["pix_password"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Versteckt
                        <input id="pix_hidden" name="pix_hidden" placeholder="Versteckt" type="hidden"  value="<?php echo (isset($_POST["pix_hidden"]))? $_POST["pix_hidden"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <label>Textarea
                        <textarea id="pix_textarea" name="pix_textarea" placeholder="Textarea" rows="5" cols="40"><?php echo (isset($_POST["pix_textarea"]))? $_POST["pix_textarea"] : ""; ?></textarea>
                    </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <label>Dropdown
                        <select id="pix_select" name="pix_select">
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <div class="captcha">
                        <?php require( get_stylesheet_directory() . '/include/class_new/reCAPTCHA/main.php'); ?>
                    </div>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <input id="pix_submit" name="pix_submit" type="submit" value="Absenden" />
                </p>
            </div>
        </div>
    </div>
</form>


<style>

label{display: block;}
form{position: relative;}
    .loading{display: none;position: absolute;top: 0;left: 0;width: 100%;height: 100%;background-color: rgba(255, 255, 255, 0.8);z-index: 2;}
    .loading .animation{display: block;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);z-index: 3;border: 8px solid #f3f3f3;border-top: 8px solid #3498db;border-radius: 50%;width: 50px;height: 50px;animation: spin 1s linear infinite;}
    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }
</style>

<script>

$("form.ajaxForm").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
    var solved = document.cookie
                    .split('; ')
                    .find(row => row.startsWith('solved='))
                    .split('=')[1];
    if(solved == 'true'){
        $(".ajaxForm").css('position', 'relative');
        $(".ajaxForm").append('<div class="loading"><span class="animation"></div></div>');
        $.ajax({
            url: '<?php echo get_site_url(); ?>/wp-content/themes/moleco/include/form/main.php',
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                $(".ajaxForm").empty();
                $(".ajaxForm").html(response);
            }
        });
    }
});
</script>
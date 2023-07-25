<form id="<!-- Indivieduelle ID -->" class="ajaxForm" enctype="multipart/form-data" method="post">
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
                        <input id="text" name="text" placeholder="Text" type="text"  value="<?php echo (isset($_POST["text"]))? $_POST["text"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>E-Mail
                        <input id="email" name="email" placeholder="E-Mail" type="mail"  value="<?php echo (isset($_POST["email"]))? $_POST["email"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Telefon
                        <input id="tel" name="tel" placeholder="Telefon" type="tel"  value="<?php echo (isset($_POST["tel"]))? $_POST["tel"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>URL
                        <input id="url" name="url" placeholder="URL" type="url"  value="<?php echo (isset($_POST["url"]))? $_POST["url"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Zahl
                        <input id="number" name="number" placeholder="Zahl" type="number"  value="<?php echo (isset($_POST["number"]))? $_POST["number"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Datum
                        <input id="date" name="date" placeholder="Datum" type="date"  value="<?php echo (isset($_POST["date"]))? $_POST["date"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Zeit
                        <input id="time" name="time" placeholder="Zeit" type="time"  value="<?php echo (isset($_POST["time"]))? $_POST["time"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Farbe
                        <input id="color" name="color" placeholder="Farbe" type="color"  value="<?php echo (isset($_POST["color"]))? $_POST["color"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Bereich
                        <input id="range" name="range" placeholder="Bereich" type="range"  value="<?php echo (isset($_POST["range"]))? $_POST["range"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Checkbox
                        <input id="checkbox" name="checkbox" placeholder="Checkbox" type="checkbox"  value="<?php echo (isset($_POST["checkbox"]))? $_POST["checkbox"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Radio
                        <input id="radio" name="radio" placeholder="Radio" type="radio"  value="<?php echo (isset($_POST["radio"]))? $_POST["radio"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Datei
                        <input id="file" name="file" placeholder="Datei" type="file"  value="<?php echo (isset($_POST["file"]))? $_POST["file"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Passwort
                        <input id="password" name="password" placeholder="Passwort" type="password"  value="<?php echo (isset($_POST["password"]))? $_POST["password"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Versteckt
                        <input id="hidden" name="hidden" placeholder="Versteckt" type="hidden"  value="<?php echo (isset($_POST["hidden"]))? $_POST["hidden"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <label>Textarea
                        <textarea id="textarea" name="textarea" placeholder="Textarea" rows="5" cols="40"><?php echo (isset($_POST["textarea"]))? $_POST["textarea"] : ""; ?></textarea>
                    </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <label>Dropdown
                        <select id="select" name="select">
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
                        <?php require( get_stylesheet_directory() . '/include/class/reCAPTCHA/main.php'); ?>
                    </div>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <input id="submit" name="submit" type="submit" value="Absenden" />
                </p>
            </div>
        </div>
    </div>
</form>


<style>

label{display: block;}
    .loading{display: block;position: absolute;top: 0;left: 0;width: 100%;height: 100%;background-color: rgba(255, 255, 255, 0.8);z-index: 2;}
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
        $(".ajaxForm").append('<div class="loading"><span class="animation"></span></div>');
        $.ajax({
            url: '<?php echo get_stylesheet_directory_uri(); ?>/include/form/main.php',
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
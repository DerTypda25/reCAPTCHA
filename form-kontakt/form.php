<form id="<!-- Indivieduelle ID -->" class="ajaxForm" enctype="multipart/form-data" method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p>Kontakt</p> 
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>
                    <label>Vorname*
                        <input required id="vorname" name="vorname" placeholder="Vorname*" type="text"  value="<?php echo (isset($_POST["vorname"]))? $_POST["vorname"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Nachname*
                        <input required id="nachname" name="nachname" placeholder="Nachname*" type="text"  value="<?php echo (isset($_POST["nachname"]))? $_POST["nachname"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>E-Mail
                        <input required id="email" name="email" placeholder="E-Mail" type="mail"  value="<?php echo (isset($_POST["email"]))? $_POST["email"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Telefon
                        <input required id="tel" name="tel" placeholder="Telefon" type="tel"  value="<?php echo (isset($_POST["tel"]))? $_POST["tel"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>Straße, Hausnummer
                        <input id="adresse" name="adresse" placeholder="Straße, Hausnummer" type="text"  value="<?php echo (isset($_POST["adresse"]))? $_POST["adresse"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
            <div class="col-6">
                <p>
                    <label>PLZ, Wohnort
                        <input id="plz" name="plz" placeholder="PLZ, Wohnort" type="text"  value="<?php echo (isset($_POST["plz"]))? $_POST["plz"] : ""; ?>" size="17" />
                    </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    <label>Nachricht
                        <textarea id="note" name="note" placeholder="Nachricht" rows="5" cols="40"><?php echo (isset($_POST["note"]))? $_POST["note"] : ""; ?></textarea>
                    </label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    * Pflichtfelder
                </p>
            </div>
            <div class="col-12">
                <p>
                    <label>Ich habe die <a href="<?php echo get_site_url(); ?>/datenschutz" target="_blank">Datenschutzerklärung</a> zur Kenntnis genommen und stimme zu, dass meine Angaben zur Kontaktaufnahme und für Rückfragen gespeichert werden.
                        <input id="checkbox" name="datenschutz" type="checkbox" value="1" required/>
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
    $(".ajaxForm").find('input').prop('disabled', false);
    var formData = new FormData(this);
    var solved = document.cookie
                    .split('; ')
                    .find(row => row.startsWith('solved='))
                    .split('=')[1];
    if(solved == 'true'){
        $(".ajaxForm").css('position', 'relative');
        $(".ajaxForm").append('<div class="loading"><span class="animation"></span></div>');
        $.ajax({
            url: '<?php echo get_stylesheet_directory_uri(); ?>/include/form-kontakt/main.php',
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

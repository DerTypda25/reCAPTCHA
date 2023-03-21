<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
require_once( get_stylesheet_directory() . '/include/class/mailClass.php'); 

$messagetext = 'Es wurde eine Nachricht abgeschickt!<br />
    <strong>Stelle</strong>:<br>
    <strong>Vorname</strong>: '.$_POST["pix_name_bewerben"].'<br>
    <strong>Nachname</strong>: '.$_POST["pix_lastname_bewerben"].'<br>
    <strong>Telefon</strong>: '.$_POST["pix_telefon_bewerben"].'<br>
    <strong>E-Mail</strong>: '.$_POST["pix_email_bewerben"].'<br>
    <strong>Straße</strong>: '.$_POST["pix_strasse_bewerben"].'<br>
    <strong>Ort</strong>: '.$_POST["pix_plzort_bewerben"].'<br>
    <strong>Nachricht</strong>: '.$_POST["note"].'<br>
    <br>';

$title = 'Nachricht von ' . wp_strip_all_tags($_POST['pix_name_bewerben']) . ' | ' . wp_strip_all_tags($_POST['pix_email_bewerben']);
$my_post = array(
    'post_type'     => 'kontaktanfragen',
    'post_title'    => $title,
    'post_content'  => $messagetext,
    'post_status'   => 'publish',
    'post_author'   => 1,
    //'post_category' => array( 8,39 )
);        
$return = wp_insert_post( $my_post );

if(is_wp_error($return)){
    echo '<div class="container">
            <div style="background:#EF3C39;padding:10px;margin:10px 0 0;color:#fff;display: inline-block;">Es gab einen Fehler beim speichern deiner Anfrage. Bitte wende dich direckt an uns.</div>
            </div>';
}
      
/**
 * @param
 * $empfaenger  => E-Mailadresse des Empängers
 * $betreff     => Betreff Der E-Mail
 * $messagetext   => Nachrichtentext der E-Mail
 * $from        => Absender als Text Beispiel: MOLECO GmbH
 * $replyto     => Absende E-Mail Beispiel: noreply@moleco.de
 * 
 * (Optional)
 *  $attachments => Datei anhänge
 * 
 */
mail::wp_htmlmail('d.wigger@moleco.de', 'Es wurde eine Bewerbung über moleco.de geschickt', $messagetext, 'Moleco GmbH', 'noreply@moleco.de');

?>
<div style='display:block;margin:25px 10px;padding:20px;color:#fff;background-color:#097d09;text-align:center;'>
    Vielen Dank für Ihre Bewerbung, wir melden uns bei Ihnen!
</div>


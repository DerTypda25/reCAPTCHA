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
    <br>';

require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');  

$files = $_FILES['pix_datei'];  
$img_ids = [];
$attachments = [];

if($files['name'][0]){ 
    foreach ($files['name'] as $key => $value) {
        if ($files['name'][$key]) {
            $file = array(
                'name' => $files['name'][$key],
                'type' => $files['type'][$key],
                'tmp_name' => $files['tmp_name'][$key],
                'error' => $files['error'][$key],
                'size' => $files['size'][$key]
            );
            $_FILES = array("upload_file" => $file);
            if (wp_check_filetype($files['name'][$key], 'image/*')) {
                $upload_ids[] = media_handle_upload("upload_file", 0,array(),array('test_form' => false));   
            }
        }
    }
}   

$title = 'Bewerbung von ' . wp_strip_all_tags($_POST['pix_name_bewerben']) . ' | ' . wp_strip_all_tags($_POST['pix_email_bewerben']);
$my_post = array(
    'post_type'     => 'bewerbungen',
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
foreach($upload_ids as $id){
    array_push($attachments,get_attached_file($id));
    if(isset($return)){
        $row = array(
            'field_634d0f46d0424' => $id   //Fieldkey of img field
        );
        add_row('field_634d0f3cd0423',$row,$return); //Fieldkey of repeater field
    }
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
mail::wp_htmlmail('d.wigger@moleco.de', 'Es wurde eine Bewerbung über moleco.de geschickt', $messagetext, 'Moleco GmbH', 'noreply@moleco.de', $attachments);

?>
<div style='display:block;margin:25px 10px;padding:20px;color:#fff;background-color:#097d09;text-align:center;'>
    Vielen Dank für Ihre Bewerbung, wir melden uns bei Ihnen!
</div>


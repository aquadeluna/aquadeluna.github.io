<?php
/*
// Nur fuer Debugging-Zwecke:
echo( "Debug-Informationen: [BEGINN...<br>" );
$params = $argv;
for( $i = 0; $i < sizeof( $params ); $i++ ) {
  echo "&nbsp;&nbsp;", $params[$i], "<br>";
}
echo( "Debug-Informationen: ...ENDE]<br>" );
*/

$HTTP_URL = "http://www.aquadeluna.de";

// formCorrect gesetzt bedeutet, dass der nutzer seinen eintrag noch einmal korrigieren will;
// request wird dafuer einfach umgeleitet auf die seite guestbook.php?show=all
if( isset( $formCorrect ) ) {
  $urlParams = "?show=all";
  $urlParams .= "&formUserName=" . $formUserName;
  $urlParams .= "&formUserEmail=" . $formUserEmail;
  $urlParams .= "&formUserWebsite=" . $formUserWebsite;
  $urlParams .= "&formUserMessage=" . $formUserMessage;

  // header( "Request-URI: " . $HTTP_URL . "/_php/guestbook.php" . $urlParams );
  // header( "Content-Location: " . $HTTP_URL . "/_php/guestbook.php" . $urlParams );
  header( "Location: " . $HTTP_URL . "/_php/guestbook.php" . $urlParams );
  
  // sicher gehen, dass der folgende code nicht ausgefuehrt wird
  exit;
} // end if()

// Einstellungen aus der Konfigurationsdatei laden
require( "./guestbook_config.php" );

// die lokalen Datums- und Zeiteinstellung auf Deutschland einstellen
setlocale( "LC_TIME", "de_DE" );

// benoetigte, globale Variablen initialisieren
$gbFile = "";
$gbFileHeader = "";
$gbExistsFile = 0;
$gbValidFile = 0;
$gbShowEntries = array();

// Pruefen, ob die Gaestebuchdatei existiert
$gbExistsFile = file_exists( $guestbookFilename );

if( $gbExistsFile ) {
  // G�stebuchdatei komplett in String-Array lesen; jede Dateizeile entspricht einem Array-Feld
  $gbFile = file( $guestbookFilename );

  // erster Eintrag im Array ist der Datei-Header, der das GB identifiziert
  $gbFileHeader = explode( "|", $gbFile[0] );
  // den Datei-Header auswerten
  $gbValidFile = ( $gbFileHeader[0] == $gbHeaderName ) && ( $gbFileHeader[1] == $gbHeaderVersion );

/*
  // Nur fuer Debugging-Zwecke:
  echo( "Debug-Informationen: [BEGINN...<br>" );
  for( $i = 0; $i < sizeof( $gbFile ); $i++ ) {
    echo "&nbsp;&nbsp;", $gbFile[$i], "<br>";
  }
  echo( "Debug-Informationen: ...ENDE]<br>" );
*/
} // end if()
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
	<title>Aqua de Luna : Kontakt ~ Synchronschwimmen und Wasserballett der besonderen Art</title>

  <meta http-equiv="content-type" content="text/html"; charset="iso-8859-1">
  <meta http-equiv="content-script-type" content="text/javascript">
  <meta http-equiv="content-style-type" content="text/css">

  <meta name="robots" content="index, follow">
  <meta name="revisit-after" content="7 days">
  <meta name="description" content="Aqua de Luna sind professionelle Synchronschwimmerinnen, die sich auf das Show-Wasserballett spezialisiert haben. Seit vielen Jahren arbeiten wir f&uuml;r den Friedrichstadtpalast Berlin und treten t&auml;glich als Unterwasserballett in den jeweiligen Abendrevuen auf. Dar&uuml;ber hinaus wird Aqua de Luna auch f&uuml;r private Veranstaltungen verschiedenster Art gebucht.">
  <meta name="keywords" content="Synchronschwimmen, Synchronschwimmerinnen, Wasserballett, Wasserballet, Wasserbalett, Wasser, Ballett, Unterwasser, Unterwasserballett, Unterwassershow, Unterwasserartistik, Revue, Nixen, Artistik, Friedrichstadtpalast, Aqua de Luna, Aqua, Luna, Aquadeluna, Schwimmen, Schwimmerinnen, Privater Showauftritt, Showauftritt, Private Show, Show, ShowBiz, Auftritt, Schwimmbecken, Pool, Swimmingpool">

  <link rel="stylesheet" type="text/css" href="../_css/win_style.css">
  <script language="JavaScript" src="../_javascript/images_code.js" type="text/javascript"></script>
</head>

<body bgcolor="#000033" text="#CC9900" link="#0099CC" vlink="#0099CC" alink="#0099CC" bgproperties="FIXED"
 marginwidth="0" leftmargin=0 marginheight="0" topmargin="0"
 onLoad="preloadImages( '../_images/btn_home.gif', '../_images/btn_home_over.gif', '../_images/btn_presse.gif', '../_images/btn_presse_over.gif', '../_images/btn_galerie.gif', '../_images/btn_galerie_over.gif', '../_images/btn_referenzen.gif', '../_images/btn_referenzen_over.gif', '../_images/btn_kontakt.gif', '../_images/btn_kontakt_over.gif', '../_images/btn_links.gif', '../_images/btn_links_over.gif' )">

<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="58" height="120" background="../_images/menue_bkg1.jpg"><img
      src="../_images/empty.gif" width="58" height="5" border="0" alt=""></td>
    
    <td width="110" height="120" align="left" valign="bottom" background="../_images/menue_bkg2.jpg"><a 
      href="../index.html" title="Aqua de Luna - Synchronschwimmen und Wasserballett der besonderen Art"
      onMouseOver="swapImage( 'HOME', '../_images/btn_home_over.gif' )"
      onMouseOut="swapImage( 'HOME', '../_images/btn_home.gif' )"><img 
      src="../_images/btn_home.gif" width="100" height="35" border="0"
      name="HOME" alt="Aqua de Luna - Synchronschwimmen und Wasserballett der besonderen Art"></a><br><img 
      src="../_images/empty.gif" width="110" height="5" border="0" 
      name="" alt=""></td>

    <td width="120" height="120" align="left" valign="bottom" background="../_images/menue_bkg3.jpg"><a
      href="../galerie/index.html" title="Aqua de Luna - Galerie mit Bildern aus verschiedenen Auftritten"
      onMouseOver="swapImage( 'GALERIE', '../_images/btn_galerie_over.gif' )"
      onMouseOut="swapImage( 'GALERIE', '../_images/btn_galerie.gif' )"><img 
      src="../_images/btn_galerie.gif" width="110" height="35" border="0" 
      name="GALERIE" alt="Aqua de Luna - Galerie mit Bildern aus verschiedenen Auftritten"></a><br><img 
      src="../_images/empty.gif" width="120" height="5" border="0" 
      name="" alt=""></td>

    <td width="109" height="120" align="left" valign="bottom" background="../_images/menue_bkg4.jpg"><a
      href="../presse/index.html" title="Aqua de Luna - Presseartikel aus verschiedenen Zeitungen und Zeitschriften"
      onMouseOver="swapImage( 'PRESSE', '../_images/btn_presse_over.gif' )"
      onMouseOut="swapImage( 'PRESSE', '../_images/btn_presse.gif' )"><img 
      src="../_images/btn_presse.gif" width="100" height="35" border="0"
      name="PRESSE" alt="Aqua de Luna - Presseartikel aus verschiedenen Zeitungen und Zeitschriften"></a><br><img 
      src="../_images/empty.gif" width="109" height="10" border="0" 
      name="" alt=""></td>

    <td width="133" height="120" align="left" valign="bottom" background="../_images/menue_bkg5.jpg"><a
      href="../referenzen/index.html" title="Aqua de Luna - Referenzen bisheriger Auftritte"
      onMouseOver="swapImage( 'REFERENZEN', '../_images/btn_referenzen_over.gif' )"
      onMouseOut="swapImage( 'REFERENZEN', '../_images/btn_referenzen.gif' )"><img 
      src="../_images/btn_referenzen.gif" width="129" height="35" border="0"
      name="REFERENZEN" alt="Aqua de Luna - Referenzen bisheriger Auftritte"></a><br><img 
      src="../_images/empty.gif" width="133" height="20" border="0" 
      name="" alt=""></td>

    <td width="119" height="120" align="left" valign="bottom" background="../_images/menue_bkg6.jpg"><a
      href="../kontakt/index.html" title="Aqua de Luna - Kontakt mit Email-Formular"
      onMouseOver="swapImage( 'KONTAKT', '../_images/btn_kontakt_over.gif' )"
      onMouseOut="swapImage( 'KONTAKT', '../_images/btn_kontakt.gif' )"><img 
      src="../_images/btn_kontakt.gif" width="112" height="35" border="0"
      name="KONTAKT" alt="Aqua de Luna - Kontakt mit Email-Formular"></a><br><img 
      src="../_images/empty.gif" width="119" height="36" border="0" 
      name="" alt=""></td>

    <td colspan="2" width="151" height="120" align="left" valign="bottom" background="../_images/menue_bkg7.jpg"></td>
  </tr>
</table>

  <table width="679" align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td valign="top"><img
        src="../_images/empty.gif" width="25" height="15" border="0"></td>
      <td valign="top"><img
        src="../_images/empty.gif" width="254" height="15" border="0"></td>
      <td valign="top"><img 
        src="../_images/empty.gif" width="300" height="15" border="0"></td>
      <td valign="top"><img 
        src="../_images/empty.gif" width="100" height="15" border="0"></td>
    </tr>

    <tr>
      <td rowspan="3" valign="top"><img 
        src="../_images/umrandung_links.gif" width="25" height="49" border="0"
        name="" alt=""></td>
        
      <td valign="top"><img 
        src="../_images/umrandung_oben.gif" width="254" height="8" border="0"
        name="" alt=""></td>

      <td valign="top"><img 
        src="../_images/umrandung_oben.gif" width="300" height="8" border="0"
        name="" alt=""></td>

      <td valign="top"><img 
        src="../_images/umrandung_obenfadeout.gif" width="100" height="8" border="0
        name="" alt=""></td>
    </tr>
    
    <tr valign="middle">
      <td height="33"><font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="5"><b><i>G&auml;stebuch</i></b></font></td>
        
      <td align="center"><font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3"><b>
        <span class="normal"><a href="../kontakt/index.html" title="E-Mail an Aqua de Luna">E-Mail</a></span>&nbsp;
        <span class="normal"><a href="../kontakt/kontakt_buchung.html" title="Aqua de Luna buchen">Buchung</a></span>&nbsp;
        <span class="normal">G&auml;stebuch</span>
        </b></font></td>

      <td align="right"><font
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="2"><b>
        <span class="normal"><a href="../index.html" title="www.aquadeluna.de">Home</a></span>
        </b></font></td>
    </tr>

    <tr>
      <td colspan="3" valign="top"><img 
        src="../_images/umrandung_unten.gif" width="154" height="8" border="0"
        name="" alt=""><img 
        src="../_images/umrandung_untenfadeout.gif" width="100" height="8" border="0
        name="" alt=""></td>
    </tr>
    
    <tr>
      <td colspan="4" valign="top">&nbsp;</td>
    </tr>
  </table>

<?php
// Fehler ausgeben, wenn das Gaestebuch (bzw. die Datei) nicht existiert
if( !$gbExistsFile ) {
?>
  <table width="679" align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td valign="top"><img
        src="../_images/empty.gif" width="10" height="15" border="0"></td>
      <td valign="top"><img
        src="../_images/empty.gif" width="669" height="15" border="0"></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>

      <td align="left" valign="middle">
        <span class="normal"><b>Auf dem Web-Server ist kein Aqua de Luna-G&auml;stebuches installiert.
        Bitte kontaktieren Sie den Webmaster unter 
        <a href="mailto:<?php echo( $webmasterMail )?>?subject=Kein%20Gaestebuch%20vorhanden"><?php echo( $webmasterMail )?></a>.</b></span>
      </td>
    </tr>
  </table>

</body>
</html>
<?php
  exit;
}

// Fehler ausgeben, wenn das Gaestebuch (bzw. die Datei) in der falschen Version vorliegt
if( !$gbValidFile ) {
?>
  <table width="679" align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td valign="top"><img
        src="../_images/empty.gif" width="10" height="15" border="0"></td>
      <td valign="top"><img
        src="../_images/empty.gif" width="669" height="15" border="0"></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>

      <td align="left" valign="middle">
        <span class="normal"><b>Auf dem Web-Server ist eine falsche Version des Aqua de Luna-G&auml;stebuches installiert.
        Bitte kontaktieren Sie den Webmaster unter 
        <a href="mailto:<?php echo( $webmasterMail )?>?subject=Falsche%20Version%20des%20Gaestebuchs"><?php echo( $webmasterMail )?></a>.</b></span>
      </td>
    </tr>
  </table>

</body>
</html>
<?php
  exit;
}
?>

  <table width="679" align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td valign="top"><img
        src="../_images/empty.gif" width="10" height="15" border="0"></td>
      <td valign="top"><img
        src="../_images/empty.gif" width="669" height="15" border="0"></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>

      <td align="left" valign="middle">
        <span class="normal"><b>&nbsp;</b></span>
      </td>
    </tr>
    
<?php
// Wenn das Gaestebuch falsch aufgerufen wurde, dann soll eine Fehlermeldung erscheinen und die Abarbeitung des Skriptes
// beendet werden.
if( !isset( $formSave ) ) {
?>
    <tr>
      <td>&nbsp;</td>

      <td align="left" valign="middle">
        <span class="normal"><b>Das G&auml;stebuch wurde wohl versehentlich falsch aufgerufen. Bitte kontaktieren Sie in diesem Fall den Webmaster unter 
        <a href="mailto:<?php echo( $webmasterMail )?>?subject=Falscher%20Aufruf%des%20Gaestebuches%20(3)"><?php echo( $webmasterMail )?></a>
        und beschreiben bitte kurz, wie es zu dieser Fehlersituation kam.</b></span></td>
    </tr>
  </table>

</body>
</html>

<?php
  exit;
} else {
  $gbEntry = $formUserName . "|" . $formUserEmail . "|" . $formUserWebsite . "|" . $formUserMessage . "|" . $formDate . "|1|" . $REMOTE_ADDR . "\n";

  $p_gbFile = fopen( $guestbookFilename, "a" );
  fputs( $p_gbFile, $gbEntry );

  if( flock( $p_gbFile, 3 ) ) {
    fclose( $p_gbFile );
  } else {
?>
    <tr>
      <td>&nbsp;</td>

      <td align="left" valign="middle">
        <span class="normal"><b>Beim Schreiben der G&auml;stebuch-Datei ist ein Fehler aufgetreten. Bitte kontaktieren Sie in diesem Fall den Webmaster unter 
        <a href="mailto:<?php echo( $webmasterMail )?>?subject=Fehler%20beim%20Schreiben%20der%20Datei"><?php echo( $webmasterMail )?></a>
        und beschreiben bitte kurz, wie es zu dieser Fehlersituation kam.</b></span></td>
    </tr>
  </table>

<?php
    $mailMessage = "Hallo " . $webmastername . ",\n\n";
    $mailMessage .= "Die G�stebuchdatei konnte nicht ge�ffnet werden.\n";
    $mailMessage .= "Der Eintrag des Benutzers wurde nicht geschrieben.\n\n";

    // Mail mit Fehlermeldung an den Webmaster verschicken
    mail( $webmasterMail, "G�stebuch-Fehler", $mailMessage, "From: " . $webmasterMail . "\nReply-To: " . $webmasterMail . "\nX-Mailer: PHP/" . phpversion() );
?>

</body>
</html>

<?php    
    exit;
  } // end if/else()

  $day = strftime( "%e", $formDate );
  $month = strftime( "%B", $formDate );
  $time = strftime( "%H:%M", $formDate );

  $mailMessage .= "Neuer Eintrag im Aqua de Luna-G�stebuch:\n";
  
  // G�stebucheintrag f�r Mail aufbereiten...
  $mailMessage .= "Name: " . $formUserName . "\n";
  $mailMessage .= "eMail: " . $formUserEmail . "\n";
  $mailMessage .= "Website: " . $formUserWebsite . "\n";
  $mailMessage .= "Nachricht: " . $formUserMessage . "\n";
  $mailMessage .= "Datum: " . $day. ". " . $month . " " . $time . "\n";
  $mailMessage .= "IP-Adresse: " . $REMOTE_ADDR . "\n";

  // EMail mit dem Eintrag an den Webmaster verschicken
  mail( $gbRecipient, "Neuer G�stebucheintrag", $mailMessage, "From: " . $webmasterMail . "\nReply-To: " . $webmasterMail . "\nX-Mailer: PHP/" . phpversion() );
?>
    <tr>
      <td>&nbsp;</td>

      <td align="left" valign="middle"><font 
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="2">
        <span class="normal"><b>Vielen Dank f&uuml;r den Eintrag, er wurde soeben ins Aqua de Luna-G&auml;stebuch
        geschrieben.<br><br>
        <a href="./guestbook.php?show=all">Hier</a> kann der neue Eintrag angesehen werden.</b></span></font></td>
    </tr>
  </table>

<?php
} // end if/else()
?>

<p align="center"><font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="1">
<a href="/galerie/index.html" title="Aqua de Luna - Galerie mit Bildern aus verschiedenen Auftritten">Galerie</a> | 
<a href="/presse/index.html" title="Aqua de Luna - Presseartikel aus verschiedenen Zeitungen und Zeitschriften">Presse</a> | 
<a href="/referenzen/index.html" title="Aqua de Luna - Referenzen bisheriger Auftritte">Referenzen</a> | 
<a href="/kontakt/index.html" title="Aqua de Luna - Kontakt mit Email-Formular">Kontakt</a> | 
<a href="javascript: openWindow( '/impressum.html', 'impressumWindow', 550, 500, 'scrollbars=1,status=0,toolbar=0,location=0,menubar=0,resizable=1', false );">Impressum</a>
</font></p>

</body>
</html>

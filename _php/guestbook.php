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
  // sicher gehen, dass der folgende code nicht ausgefuehrt wird
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
  // sicher gehen, dass der folgende code nicht ausgefuehrt wird
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
if( !isset( $show ) ) {
?>
    <tr>
      <td>&nbsp;</td>

      <td align="left" valign="middle">
        <span class="normal"><b>Das G&auml;stebuch wurde wohl versehentlich falsch aufgerufen. Bitte kontaktieren Sie in diesem Fall den Webmaster unter 
        <a href="mailto:<?php echo( $webmasterMail )?>?subject=Falscher%20Aufruf%des%20Gaestebuches%20(1)"><?php echo( $webmasterMail )?></a>
        und beschreiben bitte kurz, wie es zu dieser Fehlersituation kam.</b></span></td>
    </tr>
  </table>

</body>
</html>

<?php
  // sicher gehen, dass der folgende code nicht ausgefuehrt wird
  exit;
} else {
  // Wenn das Gaestebuch mit falschen Werten aufgerufen wurde, dann soll eine Fehlermeldung erscheinen und die Abarbeitung 
  // des Skriptes beendet werden.
  if( ( $show != "all" ) && ( $show != "new" ) ) {
?>
    <tr>
      <td>&nbsp;</td>

      <td align="left" valign="middle">
        <span class="normal"><b>Das G&auml;stebuch wurde wohl versehentlich falsch aufgerufen. Bitte kontaktieren Sie in diesem Fall den Webmaster unter 
        <a href="mailto:<?php echo( $webmasterMail )?>?subject=Falscher%20Aufruf%des%20Gaestebuches%20(2)"><?php echo( $webmasterMail )?></a>
        und beschreiben bitte kurz, wie es zu dieser Fehlersituation kam.</b></span></td>
    </tr>
  </table>

</body>
</html>

<?php
    // sicher gehen, dass der folgende code nicht ausgefuehrt wird
    exit;
  } // end if()

  // Ab hier kann davon ausgegangen werden, dass das Gaestebuch korrekt aufgerufen wurde.
  // Jetzt muss herausgefunden werden, wir es angezeigt werden soll. Dabei gibt es folgende
  // Moeglichkeiten:
  //  1. die letzten 20 Eintraege (die zuletzt ins Gaestebuch eingetragen wurden) und dem Formular
  //     zum Aufnehmen neuer Eintraege,
  //  2. andere als die letztem 20 Eintraege (der Parameter startEntry bestimmt welche 20 Eintraege) und
  //     dem Formluar zum Aufnehmen neuer Eintraege,
  //  3. nur den Beitrag anzeigen, der ins Gaestebuch eingetragen werden soll, ohne die Beitraege, die
  //     vorher zu sehen waren,
  //  4. den neuen Beitrag im Formular anzeigen (weil er noch einmal ueberarbeitet werden soll) und die
  //     entsprechenden 20 Eintraege,
  //  5. den neuen Eintrag im Gaestebuch anzeigen (weil er vom Benutzer hinzugefuegt wurde) und ein leeres
  //     Formular und die entsprechend 19 uebrigen Eintraege.

  // show == all bedeutet, dass das Gaestebuch nur gelesen wird;
  if( $show == "all" ) {
?>
    <tr>
      <td>&nbsp;</td>

      <td>
        <form action="<?php echo( $PHP_SELF )?>?show=new" method="post">
        <table width="669" align="center" cellspacing="0" cellpadding="0" border="0">
          <tr>
            <td valign="top"><img
              src="../_images/empty.gif" width="180" height="10" border="0"></td>
            <td valign="top"><img 
              src="../_images/empty.gif" width="270" height="10" border="0"></td>
            <td valign="top"><img 
              src="../_images/empty.gif" width="219" height="10" border="0"></td>
          </tr>
          
          <tr>
            <td colspan="3"><img
              src="../_images/umrandung_untenfadeout.gif" width="669" height="8" border="0"><br><img
              src="../_images/empty.gif" width="669" height="5" border="0"></td>
          </tr>

          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="5" border="0"></td>
          </tr>
          
          <tr>
            <td align="right" valign="middle"><img
              src="../_images/empty.gif" width="10" height="1" border="0"><font
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
              <span class="normal"><b>Name:&nbsp;&nbsp;</b></span></font></td>
              
            <td colspan="2" align="left" valign="middle">
              <input type="hidden" name="formDate" value="<?php echo( $formDate );?>">
              <input type="text" name="formUserName" size="30" value="<?php echo( $formUserName );?>"></td>
          </tr>
          
          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="5" border="0"></td>
          </tr>

          <tr>
            <td align="right" valign="middle"><img
              src="../_images/empty.gif" width="10" height="1" border="0"><font 
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
              <span class="normal"><b>E-Mail:&nbsp;&nbsp;</b></span></font></td>
              
            <td colspan="2" align="left" valign="middle">
              <input type="text" name="formUserEmail" value="<?php echo( $formUserEmail );?>" align="left" size="40"></td>
          </tr>
          
          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="5" border="0"></td>
          </tr>

          <tr>
            <td align="right" valign="middle"><img
              src="../_images/empty.gif" width="10" height="1" border="0"><font 
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
              <span class="normal"><b>WWW-Seite:&nbsp;&nbsp;</b></span></font></td>
              
            <td colspan="2" align="left" valign="middle">
              <input type="text" name="formUserWebsite" value="<?php echo( $formUserWebsite );?>" align="left" size="40"></td>
          </tr>

          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="5" border="0"></td>
          </tr>

          <tr>
            <td align="right" valign="top"><img
              src="../_images/empty.gif" width="10" height="1" border="0"><font 
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
              <span class="normal"><b>Nachricht:&nbsp;&nbsp;</b></span></font></td>
              
            <td colspan="2" align="left" valign="top">
              <textarea cols="50" rows="6" name="formUserMessage" wrap="virtual"><?php echo( $formUserMessage );?></textarea></td>
          </tr>

          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="15" border="0"></td>
          </tr>

          <tr>
            <td colspan="3">
              <input type="Reset" name="reset" value="Eingaben l&ouml;schen">&nbsp;&nbsp;
              <input type="submit" name="submit" value="   Eintrag pr&uuml;fen   "><br><img
              src="../_images/empty.gif" width="669" height="5" border="0"></td>
          </tr>

          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="5" border="0"><br><img
              src="../_images/umrandung_untenfadeout.gif" width="669" height="8" border="0"></td>
          </tr>
        </table>
      </td>
    </tr> 

    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>

<?php
    // startEntry bestimmt, welche Eintraege gelesen werden sollen; wenn der Wert nicht angegeben wurde,
    // so bedeutet dies, dass die letzten (aktuellsten) Eintraege angezeigt werden (ab der Position 0);

    if( !isset( $startEntry ) || ( $startEntry < 0 ) ) {
      $startEntry = 0;
    } // end if()
    
    // die einzelnen Eintraege im Gaestebuch durchlaufen und die herausfiltern, die angezeigt werden sollen;
    // es muss mit dem letzten Eintrag angefangen werden, da immer ans ende der datei geschrieben wird
    for( $i = sizeof( $gbFile ) - 1; $i >= 0; $i-- ) {
      // der erste Eintrag ist der Datei-Header; der kann/soll uebersprungen werden
      if( $i == 0 ) {
        continue;
      } // end if()

      $gbEntry = explode( "|", $gbFile[$i] );

      // nur die Eintraege weiterverwenden, die auch wirklich auf der Seite angezeigt werden sollen;
      // das sind all die, deren 6. Feld (0-basiert -> index == 5) == 1 ist (bedeutet, dass sie angezeigt werden sollen)
      if( $gbEntry[5] == 1 ) {
        $gbShowEntries[] = $gbFile[$i];
      } // end if()
    } // end for( i )
    
    // wenn noch kein Eintrag in GB vorhanden ist, dann auch nichts anzeigen und nicht weitermachen;
    if( sizeof( $gbShowEntries ) == 0 ) {
?>
    <tr>
      <td align="left" valign="middle" height="20">&nbsp;</td>

      <td bgcolor="#444444"><font 
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
        <span class="normal"><b>&nbsp;</b></span></font></td>
    </tr>

    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>      

    <tr>
      <td>&nbsp;</td>

      <td><font 
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
        <span class="normal"><b>Es ist noch kein Eintrag im Aqua de Luna-G&auml;stebuch vorhanden.</b></span></font></td>
    </tr>

    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>      

    <tr>
      <td align="left" valign="middle" height="20">&nbsp;</td>

      <td bgcolor="#444444"><font 
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
        <span class="normal"><b>&nbsp;</b></span></font></td>
    </tr>
  </table>

</body>
</html>
<?php
      exit;
    } // end if()

/*
    // Nur fuer Debugging-Zwecke:
    echo "<br><br>Debug-Informationen: [BEGINN...<br>";
    echo "Anzahl der gefundenen Eintr&auml;ge: ", sizeof( $gbShowEntries ), "<br>";
    for( $i = 0; $i < sizeof( $gbShowEntries ); $i++ ) {
      echo "&nbsp;&nbsp;", $gbShowEntries[$i], "<br>";
    }
    echo( "Debug-Informationen: ...ENDE]<br>" );
*/
?>
    <tr>
      <td align="left" valign="middle" height="20">&nbsp;</td>
<?php
    // ermitteln, wieviel Seiten anzuzeigen sind, wenn mehr Eintraege als gbPageEntries im GB
    // vorhanden sind; sollte bei der division ein rest uebrig bleiben, so muss eine zusaetzliche
    // seite angezeigt werden.
    $countPages = (int)( sizeof( $gbShowEntries ) / $gbPageEntries );
    if( ( sizeof( $gbShowEntries ) % $gbPageEntries ) != 0 ) {
      $countPages++;
    } // end if()
    
/*
    // Nur fuer Debugging-Zwecke:
    echo "<br><br>Debug-Informationen: [BEGINN...<br>";
    echo "Anzahl der anzuzeigenden Seiten: ", $countPages, "<br>";
    echo( "Debug-Informationen: ...ENDE]<br>" );
*/
    
    // den String zusammenbauen, der zum Navigieren durch die einzelnen Seiten des Gaestebuches
    // im Kopf und im Fuss des GB angezeigt wird.
    $pageNavigString = "";
    
    // befindet man sich auf der ersten seite...
    if( $startEntry == 0 ) {
      $pageNavigString = "Vorherige Seite";
    } else {
      $pageNavigString = "<a href=\"$PHP_SELF?show=all&startEntry=";
      $pageNavigString .= ( $startEntry - $gbPageEntries );
      $pageNavigString .= "\">Vorherige Seite</a>";
    } // end if/else()
    
    $pageNavigString .= " | ";
    
    for( $i = 0; $i < $countPages; $i++ ) {
      if( ( $i * $gbPageEntries ) == $startEntry ) {
        $pageNavigString .= $i + 1;
      } else {
        $pageNavigString .= "<a href=\"$PHP_SELF?show=all&startEntry=";
        $pageNavigString .= ( $i * $gbPageEntries );
        $pageNavigString .= "\">";
        $pageNavigString .= $i + 1;
        $pageNavigString .= "</a>";
      } // end if/ else()
      
      $pageNavigString .= " ";
    } // end for( $i )
    
    $pageNavigString .= " | ";

    // befindet man sich auf der letzten seite... (countPages - 1, weil startEntry 0-basiert)
    if( $startEntry == ( $countPages - 1 ) * $gbPageEntries ) {
      $pageNavigString .= "N&auml;chste Seite";
    } else {
      $pageNavigString .= "<a href=\"$PHP_SELF?show=all&startEntry=";
      $pageNavigString .= ( $startEntry + $gbPageEntries );
      $pageNavigString .= "\">N&auml;chste Seite</a>";
    } // end if/else()
?>
      <td bgcolor="#444444"><font 
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
        <span class="normal"><b>&nbsp;&nbsp;<?php echo( $pageNavigString );?></b></span></font></td>
    </tr>

    <tr>
      <td>&nbsp;</td>

      <td align="center" valign="middle">
        <table width="550" align="center" cellspacing="0" cellpadding="0" border="0">
          <tr>
            <td valign="top"><img
              src="../_images/empty.gif" width="60" height="20" border="0"></td>
            <td valign="top"><img
              src="../_images/empty.gif" width="5" height="20" border="0"></td>
            <td valign="top"><img
              src="../_images/empty.gif" width="475" height="20" border="0"></td>
            <td valign="top"><img
              src="../_images/empty.gif" width="5" height="20" border="0"></td>
            <td valign="top"><img
              src="../_images/empty.gif" width="5" height="20" border="0"></td>
          </tr>
<?php
    // alle anzuzeigenden Eintraege durchlaufen und diejenigen anzeigen, die sich
    // innerhalb des Bereiches anzuzeigender Eintraege befinden (startEntry + gbPageEntries);
    for( $i = $startEntry; ( $i < sizeof( $gbShowEntries ) ) && ( $i < ( $startEntry + $gbPageEntries ) ); $i++ ) {
      $gbEntry = explode( "|", $gbShowEntries[$i] );
      
      $weekday = strftime( "%a", $gbEntry[4] );
      $day = strftime( "%e", $gbEntry[4] );
      $month = strftime( "%b", $gbEntry[4] );
      $time = strftime( "%H:%M", $gbEntry[4] );
      
      $userName = $gbEntry[0];
      $userEmail = $gbEntry[1];
      $userWebsite = $gbEntry[2];
      
      $message = $gbEntry[3];
?>
          <tr>
            <td colspan="5" bgcolor="#004455" align="center" valign="top"><img
              src="../_images/empty.gif" width="550" height="5" border="0"></td>
          </tr>

          <tr>
            <td bgcolor="#004455" align="center" valign="top">
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" color="#B0B0B0"><b><?php echo( $weekday );?></b></font><br>
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" color="#B0B0B0" size="6"><b><?php echo( $day );?></b></font><br>
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" color="#B0B0B0"><b><?php echo( $month );?></b></font>
              <hr width="90%">
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" color="#B0B0B0"><b><?php echo( $time );?></b></font></td>
                  
            <td align="left" valign="top">&nbsp;</td>

            <td align="left" valign="top"><font 
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
<?php
    if( trim( $userEmail ) == "" ) {
?>
              <span class="normal"><b><?php echo( $userName );?><br>
<?php
    } else {
?>
              <span class="normal"><b><a href="mailto:<?php echo( $userEmail );?>"><?php echo( $userName );?></a><br>
<?php
    } // end if/else()
?>
              <a href="<?php echo( $userWebsite );?>" target="_blank"><?php echo( $userWebsite );?></a></b></span></font><br><br>
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="2"><b><?php echo( $message );?></b></font></td>

            <td align="left" valign="top">&nbsp;</td>

            <td bgcolor="#004455" align="center" valign="top"><img
              src="../_images/empty.gif" width="5" height="5" border="0"></td>
          </tr>
          
          <tr>
            <td colspan="5" bgcolor="#004455" align="center" valign="top"><img
              src="../_images/empty.gif" width="550" height="5" border="0"></td>
          </tr>
<?php
      // solange nicht der letzte anzuzeigende Eintrag erreicht wurde, soll noch eine Linie zwischen den Eintraege
      // gezogen werden
      if( ( ( $i + 1 ) < ( $startEntry + $gbPageEntries ) ) &&
          ( ( $i + 1 ) < sizeof( $gbShowEntries ) ) ){
?>
          <tr>
            <td colspan="5"><img
              src="../_images/empty.gif" width="550" height="10" border="0"><br><img
              src="../_images/umrandung_untenfadeout.gif" width="550" height="8" border="0"><br><img
              src="../_images/empty.gif" width="550" height="10" border="0"></td>
          </tr>
<?php
      } // end if()
    } // end for( i )
?>
          <tr>
            <td colspan="5" valign="top"><img
              src="../_images/empty.gif" width="550" height="20" border="0"></td>
          </tr>
        </table>
      </td>
    </tr>

    <tr>
      <td align="left" valign="middle" height="20">&nbsp;</td>

      <td bgcolor="#444444"><font 
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
        <span class="normal"><b>&nbsp;&nbsp;<?php echo( $pageNavigString );?></b></span></font></td>
    </tr>
<?php
  } // end if()

  // show == new bedeutet, dass ein neuer Eintrag ins Gaestebuch aufgenommen werden soll;
  if( $show == "new" ) {
?>
    <tr>
      <td>&nbsp;</td>

      <td align="center" valign="middle">
        <table width="550" align="center" cellspacing="0" cellpadding="0" border="0">
          <tr>
            <td valign="top"><img
              src="../_images/empty.gif" width="60" height="20" border="0"></td>
            <td valign="top"><img
              src="../_images/empty.gif" width="5" height="20" border="0"></td>
            <td valign="top"><img
              src="../_images/empty.gif" width="475" height="20" border="0"></td>
            <td valign="top"><img
              src="../_images/empty.gif" width="5" height="20" border="0"></td>
            <td valign="top"><img
              src="../_images/empty.gif" width="5" height="20" border="0"></td>
          </tr>

          <tr>
            <td colspan="5" align="left" valign="top"><img
              src="../_images/empty.gif" width="550" height="5" border="0"></td>
          </tr>

          <tr>
            <td colspan="5" align="left" valign="top"><font 
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="1" color="#777777">
              <span class="small_gray"><i>Der folgende Eintrag wird so, wie er hier zu sehen ist, in das
              Aqua de Luna-G&auml;stebuch aufgenommen. Soll der Eintrag noch einmal verbessert bzw. 
              berichtigt werden, so bet&auml;tigen Sie den Button <b>"Eintrag korrigieren"</b>. Wenn der
              Eintrag aufgenommen werden soll, so bet&auml;tigen Sie bitte den Button <b>"Eintrag ansenden"</b>.</i></span></font></td>
          </tr>

          <tr>
            <td colspan="5" align="left" valign="top"><img
              src="../_images/empty.gif" width="550" height="20" border="0"></td>
          </tr>
<?php
    // das aktuelle datum ermitteln und entsprechend fuer die anzeige formatieren.
    $currentDate = date( "U" );
    $weekday = strftime( "%a", $currentDate );
    $day = strftime( "%e", $currentDate );
    $month = strftime( "%b", $currentDate );
    $time = strftime( "%H:%M", $currentDate );
    
    // nicht zulassen, dass html-befehle angezeigt bzw. ausgefuehrt werden koennen
    $formUserEmail = trim( strtolower( $formUserEmail ) );
    $formUserEmail = htmlentities( strtolower( $formUserEmail ) );
    $formUserName = trim( $formUserName );
    $formUserName = htmlentities( $formUserName );
    $formUserWebsite = trim( strtolower( $formUserWebsite ) );
    $formUserWebsite = htmlentities( strtolower( $formUserWebsite ) );
    $formUserMessage = trim( $formUserMessage );
    $formUserMessage = htmlentities( $formUserMessage, ENT_QUOTES );
    
    // wenn die web-adresse nicht mit einem http:// beginnt, dann dieses hinzufuegen
    if( ( $formUserWebsite != "" ) && !strstr( $formUserWebsite, "http://" ) ) {
      $formUserWebsite = "http://" . $formUserWebsite;
    } // end if()
    
    // CR und LF umkonvertieren, da es spaeter html angezeigt werden soll.
    $formUserMessage = str_replace( chr( 10 ), "", $formUserMessage );
    $formUserMessage = str_replace( chr( 13 ), "<br>", $formUserMessage );
?>
          <tr>
            <td colspan="5" bgcolor="#004455" align="center" valign="top"><img
              src="../_images/empty.gif" width="550" height="5" border="0"></td>
          </tr>

          <tr>
            <td bgcolor="#004455" align="center" valign="top">
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" color="#B0B0B0"><b><?php echo( $weekday );?></b></font><br>
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" color="#B0B0B0" size="6"><b><?php echo( $day );?></b></font><br>
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" color="#B0B0B0"><b><?php echo( $month );?></b></font>
              <hr width="90%">
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" color="#B0B0B0"><b><?php echo( $time );?></b></font></td>
                  
            <td align="left" valign="top">&nbsp;</td>

            <td align="left" valign="top"><font 
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
<?php
    if( trim( $formUserEmail ) == "" ) {
?>
              <span class="normal"><b><?php echo( $formUserName );?><br>
<?php
    } else {
?>
              <span class="normal"><b><a href="mailto:<?php echo( $formUserEmail );?>"><?php echo( $formUserName );?></a><br>
<?php
    } // end if/else()
?>
              <a href="<?php echo( $formUserWebsite );?>"><?php echo( $formUserWebsite );?></a></b></span></font><br><br>
              <font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="2"><b><?php echo( $formUserMessage );?></b></font></td>

            <td align="left" valign="top">&nbsp;</td>

            <td bgcolor="#004455" align="center" valign="top"><img
              src="../_images/empty.gif" width="5" height="5" border="0"></td>
          </tr>
          
          <tr>
            <td colspan="5" bgcolor="#004455" align="center" valign="top"><img
              src="../_images/empty.gif" width="550" height="5" border="0"></td>
          </tr>
<?php
    if( $formUserMessage == "" ) {
?>
          <tr>
            <td colspan="5" valign="top"><img
              src="../_images/empty.gif" width="550" height="20" border="0"></td>
          </tr>

          <tr>
            <td colspan="5" align="left" valign="top"><font 
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="1" color="#BB2222">
              <span class="small_red"><i>Der Eintrag f&uuml;r das G&auml;stebuch ist leer. Bitte geben Sie
              einen Eintrag ein und wiederholen den Vorgang.</i></span></font></td>
          </tr>

          <tr>
            <td colspan="5" valign="top"><img
              src="../_images/empty.gif" width="550" height="20" border="0"></td>
          </tr>

          <form action="./guestbook.php?show=all" method="post">
          <tr>
            <td colspan="5" valign="top">
              <input type="hidden" name="formUserName" value="<?php echo( $formUserName );?>">
              <input type="hidden" name="formUserEmail" value="<?php echo( $formUserEmail );?>">
              <input type="hidden" name="formUserWebsite" value="<?php echo( $formUserWebsite );?>">
              <input type="hidden" name="formUserMessage" value="<?php echo( $formUserMessage );?>">
              <input type="submit" name="formCorrect" value="Eintrag korrigieren"></td>
          </tr>
<?php
    } else {
?>
          <tr>
            <td colspan="5" valign="top"><img
              src="../_images/empty.gif" width="550" height="20" border="0"></td>
          </tr>

          <form action="./guestbook_insertentry.php" method="post">
          <tr>
            <td colspan="5" valign="top">
              <input type="hidden" name="formDate" value="<?php echo( $currentDate );?>">
              <input type="hidden" name="formUserName" value="<?php echo( $formUserName );?>">
              <input type="hidden" name="formUserEmail" value="<?php echo( $formUserEmail );?>">
              <input type="hidden" name="formUserWebsite" value="<?php echo( $formUserWebsite );?>">
              <input type="hidden" name="formUserMessage" value="<?php echo( $formUserMessage );?>">
              <input type="submit" name="formCorrect" value="Eintrag korrigieren">&nbsp;&nbsp;
              <input type="submit" name="formSave" value="Eintrag absenden"></td>
          </tr>
<?php
    } // end if/else()
?>
          </form>
        </table>
      </td>
    </tr>
<?php
  } // end if()
?>

<?php
} // end if/else()
?>

    <tr>
      <td colspan="2"><br>&nbsp;</td>
    </tr>
  </table>

<p align="center"><font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="1">
<a href="/galerie/index.html" title="Aqua de Luna - Galerie mit Bildern aus verschiedenen Auftritten">Galerie</a> | 
<a href="/presse/index.html" title="Aqua de Luna - Presseartikel aus verschiedenen Zeitungen und Zeitschriften">Presse</a> | 
<a href="/referenzen/index.html" title="Aqua de Luna - Referenzen bisheriger Auftritte">Referenzen</a> | 
<a href="/kontakt/index.html" title="Aqua de Luna - Kontakt mit Email-Formular">Kontakt</a> | 
<a href="javascript: openWindow( '/impressum.html', 'impressumWindow', 550, 500, 'scrollbars=1,status=0,toolbar=0,location=0,menubar=0,resizable=1', false );">Impressum</a>
</font></p>

</body>
</html>

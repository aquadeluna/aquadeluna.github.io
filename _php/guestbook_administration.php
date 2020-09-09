<?php

/*
// Nur fuer Debugging-Zwecke:
echo( "Debug-Informationen: [BEGINN...<br>" );

echo "Werte, die als Request-Parameter &uuml;bertragen wurden:<br>";
$params = $argv;
for( $i = 0; $i < sizeof( $params ); $i++ ) {
  echo "&nbsp;&nbsp;", $params[$i], "<br>";
}

echo "Werte, die mit Hilfe der POST-Methode &uuml;bertragen wurden:<br>";
while( list( $key, $val ) = each( $HTTP_POST_VARS ) ) {
   echo "$key => $val<br>";
} // end while()
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
  // Gästebuchdatei komplett in String-Array lesen; jede Dateizeile entspricht einem Array-Feld
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
	<title>Aqua de Luna &gt;&gt;G&auml;stebuch&lt;&lt;</title>
  <meta http-equiv="Content-Style-Type" content="text/css">
  <link rel=stylesheet type="text/css" href="../css/win_style.css">

  <script language="JavaScript">
  <!--
  -->
  </script>
</head>

<body bgcolor="#000033" text="#CC9900" link="#0099CC" vlink="#0099CC" alink="#0099CC" bgproperties="FIXED"
      marginwidth="0" leftmargin=0 marginheight="0" topmargin=0>

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
      <td colspan="3" height="33"><font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="5"><b><i>Administration des &quot;Aqua de Luna&quot;-G&auml;stebuchs</i></b></font></td>
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
        Bitte kontaktiere mal den Webmaster unter 
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
        Bitte kontaktiere mal den Webmaster unter 
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

<?php
if( ( $formLogin != $adminLogin ) || ( $formPassword != $adminPassword ) ) {
?>
    <tr>
      <td>&nbsp;</td>

      <td>
        <form action="<?php echo( $PHP_SELF )?>" method="post">
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
            <td colspan="3" align="left" valign="top"><font
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
              <span class="normal"><b>Bitte Adminstrator-Login und -Passwort eingeben:</b></span></font></td>
          </tr>

          <tr>
            <td colspan="3" align="left" valign="top"><img
              src="../_images/empty.gif" width="669" height="5" border="0"></td>
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
              <span class="normal"><b>Login:&nbsp;&nbsp;</b></span></font></td>
              
            <td colspan="2" align="left" valign="middle">
              <input type="text" name="formLogin" size="30" value=""></td>
          </tr>
          
          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="5" border="0"></td>
          </tr>

          <tr>
            <td align="right" valign="middle"><img
              src="../_images/empty.gif" width="10" height="1" border="0"><font 
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
              <span class="normal"><b>Passwort:&nbsp;&nbsp;</b></span></font></td>
              
            <td colspan="2" align="left" valign="middle">
              <input type="password" name="formPassword" size="30"></td>
          </tr>
          
          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="5" border="0"></td>
          </tr>

          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="5" border="0"><br><img
              src="../_images/umrandung_untenfadeout.gif" width="669" height="8" border="0"></td>
          </tr>

          <tr>
            <td colspan="3"><img
              src="../_images/empty.gif" width="669" height="10" border="0"></td>
          </tr>

          <tr>
            <td align="right" valign="middle">
              <input type="reset" value="Reset">&nbsp;&nbsp;</td>
              
            <td colspan="2" align="left" valign="middle">
              <input type="submit" value="Login"></td>
          </tr>
        </table>
        </form>
      </td>
    </tr> 
<?php
} // end if()

if( ( $formLogin == $adminLogin ) && ( $formPassword == $adminPassword ) ) {
?>
    <tr>
      <td align="left" valign="middle" height="20">&nbsp;</td>

      <td align="right" valign="middle"><font 
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="3">
        <span class="normal"><b><a href="<?php echo( $PHP_SELF ); ?>">Logout</a></b></span></font></td>
    </tr>

    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>      

<?php
  // wenn noch kein Eintrag in GB vorhanden ist, dann auch nichts anzeigen und nicht weitermachen;
  if( sizeof( $gbFile ) == 1 ) {
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
  
  // 
  if( isset( $updateEntry ) ) {
    $day = strftime( "%e", $updateEntry );
    $month = strftime( "%B", $updateEntry );
    $time = strftime( "%H:%M", $updateEntry );
    
    $dateTime = $day . ". " . $month . " (" . $time . ")";
    $linkBack = $PHP_SELF . "?" . "formLogin=" . $formLogin . "&formPassword=" . $formPassword . "&startEntry=" . $startEntry;
    
    switch( $action ) {
      case "show":
        for( $i = 0; $i < sizeof( $gbFile ); $i++ ) {
          // der erste Eintrag ist der Datei-Header; der kann/soll uebersprungen werden
          if( $i == 0 ) {
            continue;
          } // end if()
      
          $gbEntry = explode( "|", $gbFile[$i] );
          // wenn der Eintrag gefunden wurde, der aktualisiert werden soll;
          if( $gbEntry[4] == $updateEntry ) {
            $gbFile[$i] = $gbEntry[0] . "|" . $gbEntry[1] . "|" . $gbEntry[2] . "|" . $gbEntry[3] . "|" . $gbEntry[4] . "|1|" . $gbEntry[6];
          } // end if()
        } // end for( i )

/*
  // Nur fuer Debugging-Zwecke:
  echo( "Debug-Informationen: [BEGINN...<br>" );
  for( $i = 0; $i < sizeof( $gbFile ); $i++ ) {
    echo "&nbsp;&nbsp;", $gbFile[$i], "<br>";
    $gbEntry = explode( "|", $gbFile[$i] );
    echo "&nbsp;&nbsp;<code>", htmlentities( $gbEntry[6] ), "</code><br>";
  }
  echo( "Debug-Informationen: ...ENDE]<br>" );
*/

        $gbContents = implode( "", $gbFile );
        
        unlink( $guestbookFilename );
        $p_gbFile = fopen( $guestbookFilename, "a+" );
        fputs( $p_gbFile, $gbContents );
  
        if( flock( $p_gbFile, 3 ) ) {
          fclose( $p_gbFile );
        } // end if()

        break;
      case "hide":
        for( $i = 0; $i < sizeof( $gbFile ); $i++ ) {
          // der erste Eintrag ist der Datei-Header; der kann/soll uebersprungen werden
          if( $i == 0 ) {
            continue;
          } // end if()
      
          $gbEntry = explode( "|", $gbFile[$i] );
          // wenn der Eintrag gefunden wurde, der aktualisiert werden soll;
          if( $gbEntry[4] == $updateEntry ) {
            $gbFile[$i] = $gbEntry[0] . "|" . $gbEntry[1] . "|" . $gbEntry[2] . "|" . $gbEntry[3] . "|" . $gbEntry[4] . "|0|" . $gbEntry[6];
          } // end if()
        } // end for( i )

/*
  // Nur fuer Debugging-Zwecke:
  echo( "Debug-Informationen: [BEGINN...<br>" );
  for( $i = 0; $i < sizeof( $gbFile ); $i++ ) {
    echo "&nbsp;&nbsp;", $gbFile[$i], "<br>";
    $gbEntry = explode( "|", $gbFile[$i] );
    echo "&nbsp;&nbsp;<code>", htmlentities( $gbEntry[6] ), "</code><br>";
  }
  echo( "Debug-Informationen: ...ENDE]<br>" );
*/

        $gbContents = implode( "", $gbFile );

        unlink( $guestbookFilename );
        $p_gbFile = fopen( $guestbookFilename, "a+" );
        fputs( $p_gbFile, $gbContents );
  
        if( flock( $p_gbFile, 3 ) ) {
          fclose( $p_gbFile );
        } // end if()

        break;
      case "delete":
        for( $i = 0; $i < sizeof( $gbFile ); $i++ ) {
          // der erste Eintrag ist der Datei-Header; der kann/soll uebersprungen werden
          if( $i == 0 ) {
            continue;
          } // end if()
      
          $gbEntry = explode( "|", $gbFile[$i] );
          // wenn der Eintrag gefunden wurde, der aktualisiert werden soll;
          if( $gbEntry[4] == $updateEntry ) {
            $gbFile[$i] = "";
          } // end if()
        } // end for( i )

/*
  // Nur fuer Debugging-Zwecke:
  echo( "Debug-Informationen: [BEGINN...<br>" );
  for( $i = 0; $i < sizeof( $gbFile ); $i++ ) {
    echo "&nbsp;&nbsp;", $gbFile[$i], "<br>";
    $gbEntry = explode( "|", $gbFile[$i] );
    echo "&nbsp;&nbsp;<code>", htmlentities( $gbEntry[6] ), "</code><br>";
  }
  echo( "Debug-Informationen: ...ENDE]<br>" );
*/

        $gbContents = implode( "", $gbFile );

        unlink( $guestbookFilename );
        $p_gbFile = fopen( $guestbookFilename, "a+" );
        fputs( $p_gbFile, $gbContents );
  
        if( flock( $p_gbFile, 3 ) ) {
          fclose( $p_gbFile );
        } // end if()

        break;
      default:
        break;
    } // end switch()
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
        <span class="normal"><b>Der Eintrag vom <?php echo( $dateTime ); ?> wurde aktualisiert. 
        <a href="<?php echo( $linkBack ); ?>">Hier</a> geht's zur&uuml;ck zum G&auml;stebuch.</b></span></font></td>
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
  
  // startEntry bestimmt, welche Eintraege gelesen werden sollen; wenn der Wert nicht angegeben wurde,
  // so bedeutet dies, dass die letzten (aktuellsten) Eintraege angezeigt werden (ab der Position 0);
  if( !isset( $startEntry ) || ( $startEntry < 0 ) ) {
    $startEntry = 0;
  } // end if()
    
  // die einzelnen Eintraege im Gaestebuch durchlaufen, den Header herausfiltern und den Rest in ein neues Array schreiben;
  // es muss mit dem letzten Eintrag angefangen werden, da immer ans ende der datei geschrieben wird;
  for( $i = sizeof( $gbFile ) - 1; $i >= 0; $i-- ) {
    // der erste Eintrag ist der Datei-Header; der kann/soll uebersprungen werden
    if( $i == 0 ) {
      continue;
    } // end if()

    $gbShowEntries[] = $gbFile[$i];
  } // end for( i )
    
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
    $pageNavigString = "<a href=\"$PHP_SELF?formLogin=$formLogin&formPassword=$formPassword&startEntry=";
    $pageNavigString .= ( $startEntry - $gbPageEntries );
    $pageNavigString .= "\">Vorherige Seite</a>";
  } // end if/else()
  
  $pageNavigString .= " | ";
  
  for( $i = 0; $i < $countPages; $i++ ) {
    if( ( $i * $gbPageEntries ) == $startEntry ) {
      $pageNavigString .= $i + 1;
    } else {
      $pageNavigString .= "<a href=\"$PHP_SELF?formLogin=$formLogin&formPassword=$formPassword&startEntry=";
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
    $pageNavigString .= "<a href=\"$PHP_SELF?formLogin=$formLogin&formPassword=$formPassword&startEntry=";
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

      <td align="left" valign="middle">
        <table width="550" align="left" cellspacing="0" cellpadding="0" border="0">
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
            <td valign="top"><img
              src="../_images/empty.gif" width="119" height="20" border="0"></td>
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
            
            <td align="left" valign="top"><img
              src="../_images/empty.gif" width="119" height="5" border="0"></td>
          </tr>

          <form action="<?php echo( $PHP_SELF ); ?>" method="post">
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
              
            <td align="left" valign="bottom"><font 
              face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="2">
              <input type="hidden" name="formLogin" value="<?php echo( $formLogin ); ?>">
              <input type="hidden" name="formPassword" value="<?php echo( $formPassword ); ?>">
              <input type="hidden" name="startEntry" value="<?php echo( $startEntry ); ?>">
              <input type="hidden" name="updateEntry" value="<?php echo( $gbEntry[4] ); ?>">
<?php
      if( $gbEntry[5] == 1 ) {
?>
              <input type="radio" name="action" value="show" checked>anzeigen<br>
              <input type="radio" name="action" value="hide">nicht anzeigen<br>
<?php
      } elseif( $gbEntry[5] == 0 ) {
?>
              <input type="radio" name="action" value="show">anzeigen<br>
              <input type="radio" name="action" value="hide" checked>nicht anzeigen<br>
<?php
      } // end if()
?>
              <input type="radio" name="action" value="delete">l&ouml;schen<br>
              <input type="submit" name="submit" value="Aktualisieren">
              </font></td>
          </tr>
          </form>          
          
          <tr>
            <td colspan="5" bgcolor="#004455" align="center" valign="top"><img
              src="../_images/empty.gif" width="550" height="5" border="0"></td>

            <td align="left" valign="top"><img
              src="../_images/empty.gif" width="119" height="5" border="0"></td>
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

            <td align="left" valign="top"><img
              src="../_images/empty.gif" width="119" height="5" border="0"></td>
          </tr>
<?php
    } // end if()
  } // end for( i )
?>
          <tr>
            <td colspan="5" valign="top"><img
              src="../_images/empty.gif" width="550" height="20" border="0"></td>

            <td align="left" valign="top"><img
              src="../_images/empty.gif" width="119" height="5" border="0"></td>
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
?>
  </table>
</body>
</html>

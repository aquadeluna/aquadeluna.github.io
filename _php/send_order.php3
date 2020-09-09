<?php
  $fmt_Response = implode( "", file( "order_response.htt" ) );
  $fmt_Mail = implode( "", file( "order_send.htt" ) );

  while( list( $Key, $Val ) = each( $HTTP_POST_VARS ) ) {
    $fmt_Response = str_replace( "{$Key}", $Val, $fmt_Response );
    $fmt_Mail = str_replace( "{$Key}", $Val, $fmt_Mail );
  }

  mail( $HTTP_POST_VARS["recipient"], "Buchung fuer Aqua de Luna", $fmt_Mail, 
        "From: $sender\nReply-To: $sender\nX-Mailer: PHP/" . phpversion() );
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
	<title>Kontakt ~ Synchronschwimmen, Kunstschwimmen und Wasserballett der besonderen Art</title>

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
      href="../index.html" title="Aqua de Luna - Synchronschwimmen, Kunstschwimmen und Wasserballett der besonderen Art"
      onMouseOver="swapImage( 'HOME', '../_images/btn_home_over.gif' )"
      onMouseOut="swapImage( 'HOME', '../_images/btn_home.gif' )"><img 
      src="../_images/btn_home.gif" width="100" height="35" border="0"
      name="HOME" alt="Aqua de Luna - Synchronschwimmen, Kunstschwimmen und Wasserballett der besonderen Art"></a><br><img 
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

    <td colspan="2" width="151" height="120" align="left" valign="bottom" background="../_images/menue_bkg7.jpg"><a
      href="../links/index.html" title="Aqua de Luna - Links zu diversen Web-Seiten"
      onMouseOver="swapImage( 'LINKS', '../_images/btn_links_over.gif' )"
      onMouseOut="swapImage( 'LINKS', '../_images/btn_links.gif' )"><img 
      src="../_images/btn_links.gif" width="100" height="35" border="0"
      name="LINKS" alt="Aqua de Luna - Links zu diversen Web-Seiten"></a><br><img 
      src="../_images/empty.gif" width="65" height="25" border="0" 
      name="" alt=""><font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="1"><b><a 
      href="javascript: openWindow( '../impressum.html', 'impressumWindow', 550, 500, 'scrollbars=1,status=0,toolbar=0,location=0,menubar=0,resizable=1', false );">Impressum</a></b></span></font></td>
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
      <td height="33"><font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="5"><b><i>Kontakt</i></b></font></td>
        
      <td align="center"><font
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="2"><b>
        <span class="normal"><a href="./kontakt_email.html" title="E-Mail an Aqua de Luna">E-Mail</a></span>&nbsp;
        <span class="normal"><a href="./kontakt_buchung.html" title="Aqua de Luna buchen">Buchung</a></span>&nbsp;
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
      <td colspan="4">&nbsp;</td>
    </tr>
  </table>

  <table width="679" align="center" cellspacing="0" cellpadding="0" border="0">
    <tr>
      <td valign="top"><img
        src="../_images/empty.gif" width="10" height="15" border="0"></td>
      <td valign="top"><img
        src="../_images/empty.gif" width="269" height="15" border="0"></td>
      <td valign="top"><img
        src="../_images/empty.gif" width="400" height="15" border="0"></td>
    </tr>
    
    <tr bgcolor="#444444">
      <td align="left" valign="middle" height="30">&nbsp;</td>

      <td colspan="2" align="left" valign="middle"><font 
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="+1"><b><i>Vielen Dank f&uuml;r Ihre Anfrage</i></b></font></td>
    </tr>

    <tr>
      <td colspan="3" align="left" valign="top"><img 
        src="../_images/empty.gif" width="679" height="20" border="0" alt=""></td>
      </td>
    </tr>    

    <tr>
      <td align="left" valign="middle">&nbsp;</td>

      <td colspan="2" align="left" valign="middle">
        <br><font face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="2">
        <span class="normal"><b><?php echo $fmt_Response; ?></b></span></font></td>
    </tr>

    <tr>
      <td colspan="3" align="left" valign="top"><img 
        src="../_images/empty.gif" width="679" height="20" border="0" alt=""></td>
      </td>
    </tr>    
    
    <tr>
      <td align="left" valign="middle">&nbsp;</td>

      <td colspan="2" align="left" valign="middle"><font
        face="Verdana,Tahoma,Arial,Helvetica,sans-serif" size="2">
        <span class="normal"><b><a href="../kontakt/kontakt_buchung.html">Zur&uuml;ck</a></b></span></font></td>
    </tr>

    <tr>
      <td colspan="3" align="left" valign="middle"><img
        src="../_images/empty.gif" width="679" height="15" border="0"></td>
    </tr>

    <tr>
      <td colspan="3" align="left" valign="middle"><img 
        src="../_images/waverule_unten.gif" width="630" height="15" border="0" alt=""></td>
    </tr>
    
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>

</body>
</html>
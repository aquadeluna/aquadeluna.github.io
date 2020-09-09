// *********************************************************
// Image-Preloader und Image-Animationen in JAVASCRIPT 1.1
//
// Datum:     19.04.2001
//
// Autor:     Rene Oelke
//
// *********************************************************

var menuButtons = new Array();

function preloadImages() {
  var arguments = preloadImages.arguments;
  
  if( !menuButtons ) {
    menuButtons = new Array();
  } // end if()

  for( var i = 0; i < arguments.length; i++ ) {
    menuButtons[i] = new Image();
    menuButtons[i].src = arguments[i];
  } // end for( i )
} // end preloadImages()

function swapImage( strImgName, strImgSource ) {
  var showImage = null;
  
  if( !( showImage = document[strImgName] ) && document.all ) {
    showImage = document.all[strImgName];
  } // end if()
    
  if( document.images && ( showImage != null ) ) {
    showImage.src = strImgSource;
  } // end if()
}

/*****************************************************************************
  Name     : openWindow
  Zweck    : Oeffnet ein weiteres Fenster.
  Parameter: source
             name
             width
             height
  Return   : -
  Autor    : Rene Oelke
  Datum    : 03.07.2002
  Aenderung:
 *****************************************************************************/
function openWindow( source, name, width, height, properties, center ) {
  var newWindow = null;
  var windowProps = "";
  
  windowProps = "width=" + width + ",height=" + height + "," + properties;
  
  newWindow = window.open( source, name, windowProps );
  
  if( center == true ) {
    newWindow.blur();
    newWindow.moveTo( ( screen.width / 2 ) - ( width / 2 ), ( screen.height / 2 ) - ( height / 2 ) );
  } // end if()
  
  newWindow.focus();
} // end openWindow()

/*****************************************************************************
  Name     : closeWindow
  Zweck    : Schliesst ein bestimmtes Fenster.
  Parameter: window
  Return   : -
  Autor    : Rene Oelke
  Datum    : 03.07.2002
  Aenderung:
 *****************************************************************************/
function closeWindow( windowName ) {
  windowName.close()
} // end closeWindow()

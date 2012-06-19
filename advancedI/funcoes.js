function getXHR(){
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    try {
      var xhr = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e) {
      var xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    return xhr;
  } else {
    alert('Seu browser não tem suporte ao XMLHttpRequest.');
  }
}

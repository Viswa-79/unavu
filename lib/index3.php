<html>
<head>
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getData.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form>
<input type ="text" name="name" id="name"  onkeyup="showUser(this.value)" />

</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

</body>
</html>
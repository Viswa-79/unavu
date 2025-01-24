<!DOCTYPE html>
<html>
<head>
<style>
table, td {
  border: 2px solid black;
}
</style>
</head>
<body>


<table id="myTable">
  <tr>
    <td><label>S.no</label></td>
    <td><label>Payment Terms</label></td>
  </tr>
  <tr>
    <td><input type="text" name="name[]" id="category"/></td>
    <td><input type="text" name="name[]" id="category"/></td>
  </tr>
 
</table>
<br>

<button onclick="myCreateFunction()">Add Payment Term</button>

<script>
function myCreateFunction() {
  var table = document.getElementById("myTable");
  var row = table.insertRow(-1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell1.innerHTML = "<input type='text' name='name[]' />";
  cell2.innerHTML = "<input type='text' name='name[]' />";
}

function blah() {
        document.getElementById("myTable").innerHTML = "";
}
</script>

</body>
</html>

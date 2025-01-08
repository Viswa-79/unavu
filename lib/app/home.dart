import 'package:flutter/material.dart';

class HomePage extends StatefulWidget {
  const HomePage({super.key});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: SizedBox(
        height: 150,
        child: Padding(
          padding: const EdgeInsets.only(left: 10, right: 20),
          child: Row(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              IconButton(
                style: ButtonStyle(
                  backgroundColor: MaterialStateProperty.all(
                      Color.fromARGB(255, 238, 238, 239)),
                ),
                onPressed: () {},
                icon: const Icon(
                  Icons.menu_rounded,
                ),
              ),
              SizedBox(
                width: 20,
              ),
              const Text(
                'Home',
                style: TextStyle(fontSize: 20, color: Colors.black),
              ),
              IconButton(
                style: ButtonStyle(
                  backgroundColor:
                      MaterialStateProperty.all(Color.fromARGB(255, 0, 0, 0)),
                ),
                onPressed: () {},
                icon: const Icon(
                  Icons.shopping_cart_rounded,
                  color: Colors.white,
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}


<script>
function get_process_details(id,value) {
  var c=id.substr(11);
  //alert(c);
				
  if (value != "") {
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

r = xmlhttp.responseText;
//alert(r);
const data = JSON.parse(r);
if(data.sts == 'ok'){
  

                  
}

      }
    };
    xmlhttp.open("GET","ajax/getprocess.php?id="+value,true);
    xmlhttp.send();
  }
}
</script>


<?php
include "../config.php";
if(!empty($_GET['id']))
{
    $data = array();
    
    $sql = "SELECT * FROM dia WHERE id = '".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);   
    //get user data from the database
    
    if($count > 0){
       
        $data['sts'] = 'ok';
        $data['id'] = $row['id'];
        $data['dia'] = $row['dia'];
        

    
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>


	
    $p1 = $_FILES['doct1']['name'];
    $p_tmp1 = $_FILES['doct1']['tmp_name'];
    $path = "uploads/$p1";
    $move = move_uploaded_file($p_tmp1, $path);
  
    $p2 = $_FILES['doct2']['name'];
    $p_tmp2 = $_FILES['doct2']['tmp_name'];
    $path = "uploads/$p2";
    $move = move_uploaded_file($p_tmp2, $path);
   
    $p3 = $_FILES['doct3']['name'];
    $p_tmp3 = $_FILES['doct3']['tmp_name'];
    $path = "uploads/$p3";
    $move = move_uploaded_file($p_tmp3, $path);
  
    $p4 = $_FILES['doct4']['name'];
    $p_tmp4 = $_FILES['doct4']['tmp_name'];
    $path = "uploads/$p4";
    $move = move_uploaded_file($p_tmp4, $path);
    if ($p1 != '') {
    $sql = "insert into enquiry2 (cid,doct1,doct2,doct3,doct4) values('$cid','$p1','$p2','$p3','$p4')";
    $result = mysqli_query($conn, $sql);
    }
  }

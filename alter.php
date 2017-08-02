<!DOCTYPE html>
<html>
<head>
<title>RAIT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-colors-signal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

  <script>
 function dropcol(value){
    var db=document.getElementById('database').value;
    var tb=document.getElementById('table').value;
    var cn=value;
    console.log(db,tb,cn);
	var http=new XMLHttpRequest();
	http.abort();
	http.onreadystatechange=function()
	{
      if(http.readyState==4){
        document.getElementById('table-result').innerHTML=http.responseText;
      }
    }
    http.open("GET","del.php?db="+db+"&tb="+tb+"&cn="+cn,true);
    http.send();

  }
  function f3(value){
    //console.log(value);
    var db=document.getElementById('database').value;
    var tb=document.getElementById('table').value;
    var http=new XMLHttpRequest();
    http.abort();
    
    http.onreadystatechange=function()
    {
      if(http.readyState==4){
        document.getElementById('cl').innerHTML=http.responseText;
      }
    }
    http.open("GET","test1.php?db="+db+"&tb="+value,true);
    http.send();
  }
  
  function f2(value){
    //var datab=value;
    console.log(value);
    
    var http=new XMLHttpRequest();
    http.abort();
    
    http.onreadystatechange=function()
    {
      if(http.readyState==4){
        document.getElementById('tb').innerHTML=http.responseText;
      }
    }
    http.open("GET","test.php?database="+value,true);
    http.send();

  }

  function addCol(){
    var db=document.getElementById('database').value;
    var tb=document.getElementById('table').value;
    var cn=document.getElementById('cn').value;
    var dt=document.getElementById('dt').value;
    var size=document.getElementById('size').value;
    var http=new XMLHttpRequest();
    http.abort();
    
    http.onreadystatechange=function()
    {
      if(http.readyState==4){
        document.getElementById('msg').innerHTML=http.responseText;
      }
    }
    http.open("POST","queryExecutor.php",true);
    http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    http.send("tag=addcol"+"&db="+db+"&tb="+tb+"&cn="+cn+"&dt="+dt+"&size="+size);
    document.getElementById('cn').value='';
    document.getElementById('dt').value='dtnull';
    document.getElementById('size').value='';
  }
  
  function add()
 {
  document.getElementById('table-result').innerHTML='';
	var http=new XMLHttpRequest();
    http.abort();
    
    http.onreadystatechange=function()
    {
      if(http.readyState==4){
        document.getElementById('addcol').innerHTML=http.responseText;
      }
    }
    http.open("GET","alteraddcol.php",true);
    http.send();
 }
 
 
  function DropdownFunc(x) {
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
          x.previousElementSibling.className += "w3-signal-red";
        } else {
          x.className = x.className.replace(" w3-show", "");
          x.previousElementSibling.className =
          x.previousElementSibling.className.replace("w3-signal-red", "");
        }
      }

      function accordion(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-light-grey";
            } else {
                x.className = x.className.replace(" w3-show", "");
                x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-light-grey", "");
            }
        }

  </script>

<!-- side navigation bar start -->
  <nav class="w3-sidenav w3-signal-red" style="width:160px;">
<br>
    <a href="#"><i class="fa fa-home"></i> HOME</a>
    <div class="w3-accordion">
      <a onclick="DropdownFunc(ddl)" href="#">
      <i class="fa fa-plus-square-o"></i> DDL <i class="fa fa-caret-down"></i>
      </a>
      <div id="ddl" class="w3-accordion-content w3-white">
        <div class="w3-dropdown-click">
          <a onclick="DropdownFunc(dropcreate)" href="#">
            <i class="fa fa-angle-right"></i> Create <i class="fa fa-caret-down"></i>
          </a>
          <div id="dropcreate" class="w3-dropdown-content w3-white ">
            <a href="create_DB.html"><i class="fa fa-toggle-right"></i> Database</a>
            <a href="create_table.html"><i class="fa fa-toggle-right"></i> Table</a>
          </div>
        </div>

        <a href="alter.html">
          <i class="fa fa-angle-right"></i> Alter </i>
        </a>

      </div>
    </div>
    <div class="w3-accordion">
      <a onclick="DropdownFunc(dml)" href="#">
      <i class="fa fa-plus-square-o"></i> DML <i class="fa fa-caret-down"></i>
      </a>
      <div id="dml" class="w3-accordion-content ">
        <a href="#"><i class="fa fa-angle-right"></i> Link 1</a>
        <a href="#"><i class="fa fa-angle-right"></i> Link 2</a>
        <a href="#"><i class="fa fa-angle-right"></i> Link 3</a>
      </div>
    </div>

    <a href="#"><i class="fa fa-globe"></i> HELP</a>
  </nav>
<!-- side navigation bar end -->


  <div class="w3-main" style="margin-left:160px">
    <!-- Logo and all start -->
    <header class="w3-container w3-light-grey w3-border-bottom">
      <h3>LOGO</h3>
    </header>
    <!-- Logo and all end -->

    <div id="mainWindow">
      <div class="w3-layout-container">
        <!-- Query view section start-->
        <div class="w3-layout-container">
            <div class="w3-container w3-layout-col w3-bottombar w3-leftbar w3-rightbar w3-topbar  w3-border-light-grey" style="width:100%; height: 50px;">
              <p id="cmdWindow">ALTER DATABASE </p>
            </div>
        </div>
        <!-- Query view section end -->


        <div class="w3-layout-container">
            <!-- Action section start -->
            <br>
            SELECT DATABASE:<select name='database' id="database" onclick='f2(this.value)'>
                <?php
                  $conn=mysqli_connect('localhost','root','');
                  $result=mysqli_query($conn,"SHOW DATABASES") or die(mysqli_error($conn));
                  $rowcount=mysqli_num_rows($result);
                  if($rowcount>0){
                    $rows=mysqli_fetch_array($result);
                    //$str="<select name='database' onblur='f2(this.value)'>";
                    $str="<option value='dbnull'>select db</option>";
                    for($i=0;$i<$rowcount-1;$i++){
                      mysqli_data_seek($result,$i);
                      $rows=mysqli_fetch_array($result);
                      $str.="<option value='".$rows[0]."'>".$rows[0]."</option>";
                      //$rows[0];
                    }
                    $str.='</select>';
                    echo $str;
                  }
                ?><br><hr><br>
                Select TableName:<span id='tb'></span><br><hr><br>
                <span id='cl'></span>
                            

            <!--dynamic table end here -->
            <br>
            <div id="table-result"></div>
			      <div id="addcol"></div>
            <div id="msg"></div>
            <!-- Action section end -->
        </div>
        <br>

    <footer class="w3-container w3-light-grey w3-border-top">
      <p class=" w3-right">Copyright © 2017 All rights reserved</p>
    </footer>
  </div>



</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Workshop Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "250px";
	   document.getElementById("mySidenav").style.left = "0px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	  document.getElementById("pagin").style.opacity = "0.4";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("mySidenav").style.left = "-50px";
	  document.body.style.backgroundColor = "white";
	  document.getElementById("pagin").style.opacity = "1";
	}
	</script>
  <style>
	  html{
		  overflow-x:hidden;
	  }
		#se:focus{
			outline:none;
		}
		#se{
			border-radius:7px;
			font-size:14px;
			vertical-align:middle;
			padding:6px;
			font-family: FontAwesome;
		}
    .row.content {height: 800px}
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
	.mb-5{
		margin-bottom:5px;
	}
	#cls1{
		visibility:hidden;
		
	}
	#cls2{
		display:none;
		font-size:30px;
		cursor:pointer;
		float:right;
		margin-top:5px;
	}
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
	#heading1{
		font-size:32px;
		font-weight:bold;
		padding-top:3px;
	}
	.bold{
		font-weight:bold;
	}
	hr{
		clear:both;
		border-width:4px;
		border-radius:10px;
	}
	#pop{
		border:1px solid green;
		border-radius:50%;
		padding:2px 4px;
		background-color:red;
		color:white;
		margin-left:3px;
	}
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 991px) {
      .sidenav {
        height: auto;
      }
	  .sidenav h4{
		  display:inline-block;
		  float:right;
	  }
	  #nav li{
		  display:inline-block;
	  }
      .row.content {height: auto;} 
    }
	@media screen and (max-width:700px){
		 .sidenav h4{
		  display:;
		  float:none;
	  }
	  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			padding:8px 3px;
		}
	  #nav li{
		  display:block;
	  }
	}
	@media screen and (max-width:567px){
		.hide1{
			display:none;
		}
		#se{
			padding:1px;
		}
	}
	@media screen and (max-width:439px){
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			padding:8px 3px;
		}
		.btn{
			padding:1px 6px;
		}
		body{
			font-size:13px;
		}
		#cls1{
			visibility:visible;
			
		}
		h1{
			float:left;
			margin-top:5px;
		}
		
		#cls2{
			display:block;
		}
		/*SIDEMENU ON MOBILE*/
		.sidenav {
		  height: 100%;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: -50px;
		  background-color: #EEEEEE;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		}

		.sidenav a:hover {
		  color: #000;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		#main {
		  transition: margin-left .5s;
		  padding: 16px;
		}

	}
  </style>
</head>
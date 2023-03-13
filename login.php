<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta name="viewport" content = "width-device-width , initial-scale= 1" >
<title> Login | AlamIndonesia </title>
<style>
*{
   padding : 0;
   margin:0;
   font-family:sans-serif;
 }
 #bg-login{
    background-image: url("Gunung Berkabut.jpg");
    background-size: 100%;
    display:flex;
    height: 100vh;
    justify-content: center;
    align-items:center;
 }
 .box-login{ 
    width: 300px;
    min-height :200px;
    border:1px solid #ccc;
    background-color: #fff;
    padding:15px;
    box-sizing:border-box;
    border-radius:10px;
 }
 .box-login h2{
    text-align:center;
    margin-bottom:15px;
    border-radius:10px
 }
 .input-control {
    width:100%;
    padding:10px;
    margin-bottom:15px;
    box-sizing:border-box;
    border-radius:10px;
 }
 .btn{
   padding:8px 15px;
   background-color: #40513B;
   border:none;
   cursor:pointer;
   border-radius:10px;
 }

</style>
    </head>  
<body id = "bg-login">
    <div class="box-login">
        <h2>Login</h2>
        <form action = "" method = "POST">
            <input type="text" name="username" , placeholder = "Username" class="input-control">
            <input type="password" name="pass" , placeholder = "Password" class="input-control">
            <input type="submit" name="submit" , value = "Login" class="btn">
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Form Login User</title>
        <link rel="stylesheet" href="../css/style.css">  
        <script language="javascript">
              function validasi(form) {
                if (form.username.value == "" && form.password.value == "") {
                alert("Silakan Masukan Username Dan Password Anda");
                form.user.focus();
                return(false);
              }
                if (form.username.value == "") {
                alert("Silakan Masukan Username Anda");
                form.user.focus();
                return(false);
              }
                if (form.password.value == "") {
                alert("Silakan Masukan Password Anda");
                form.pass.focus();
                return(false);
              }       
                return(true);
              }
        </script>   
    </head>
    <body>
       <div class="login">
      <div class="login-triangle"></div> 
        <h2 class="login-header">MADRASAH ALIYAH NEGERI 2 HULU SUNGAI TENGAH</h2>
                    <form class="login-container" method="post" action="loginnaction.php" onsubmit="return validasi(this)">
                        <p><input type="text" name="username"  placeholder="Name" autofocus="autofocus" /></p>
                        <p> <input type="password" name="password" placeholder="Password" /></p>
                        <input type="submit" value="Masuk">
                        <input type="button" value="Kembali" onclick="window.location='../index.php'">
                    </form>
                </div>
</html>

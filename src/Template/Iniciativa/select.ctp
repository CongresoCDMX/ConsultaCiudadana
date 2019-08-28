<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center pt-5">Bienvenido a la Consulta Ciudadana</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center white"> Selecciona la opción que deseas consultar</h3>
                            <br><br><br>
                            <div class="form-group">
                                 <a href="https://consulta.congresocdmx.gob.mx/consulta/iniciativa/lista">Lista de iniciativas </a>
                            </div>
                            <br>
                            <div class="form-group">
                                 <a href="#">Lista de proposiciones </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
body {
  margin: 0;
  padding: 0;
  background-color: #dbdbdb;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #4c4a4a;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
.white{
color: white;
}

a{
color: white;
}
a:hover, a:active {color: #d1d1d1;
}


</style>
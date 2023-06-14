<?php
include('includes/dbconnection.php');

if(isset($_POST['register']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $userRol=$_POST['userRole'];
    $create = null;
    $adminName = 'userEmployer';
    if($userRol == 2){
        $adminName = 'userEmployee';
    }


    $sql = "INSERT INTO tbladmin (AdminName, UserName, MobileNumber, Email, Password, AdminRegdate, Rol) VALUES (:adminName, :username, :phone, :email, :password,:create, :Rol)";
    $query=$dbh->prepare($sql);
    $query->bindParam(':adminName',$adminName,PDO::PARAM_STR);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':create',$create,PDO::PARAM_STR);
    $query->bindParam(':Rol',$userRol,PDO::PARAM_STR);

        $query->execute();
    $LastInsertId=$dbh->lastInsertId();
    if ($LastInsertId>0) {
        echo '<script>alert("Se ha Registrado.")</script>';
    }
    else
    {
        echo '<script>alert("Algo salió mal. Por favor intente nuevamente")</script>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Register</title>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        /* Oculta las flechas del input number */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield; /* Firefox */
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <span>Registrate</span>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Registra tu nueva cuenta</p>

            <form action="" method="post" id="register">
                <span style="display: inline-block; margin-bottom: 10px">Usuario</span>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Usuario" required="true" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                    </div>
                </div>
                <span style="display: inline-block; margin-bottom: 10px">Contraseña</span>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Contraseña" required="true" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                    </div>
                </div>
                <span style="display: inline-block; margin-bottom: 10px">Telefono</span>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="Celular" required="true" name="phone">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                    </div>
                </div>
                <span style="display: inline-block; margin-bottom: 10px">Email</span>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" required="true" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        </div>
                    </div>
                </div>
                <span style="display: inline-block; margin-bottom: 10px">Tipo de usuario</span>
                <div class="input-group mb-3">
                    <select class="form-control" name="userRole">
                        <option selected value="2">Empleado</option>
                        <option value="3">Emeplador</option>

                    </select>
                </div>
                    <!-- /.col -->
                    <div style="width: 100%; display: flex;align-items: center;justify-content:center;margin-bottom: 10px">
                        <button type="submit" name="register" class="btn btn-primary btn-block">Registrar</button>
                    </div>
                    <!-- /.col -->
            </form>

            <p><a href="../index.php">Volver al Inicio!!</a></p>

        </div>
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>

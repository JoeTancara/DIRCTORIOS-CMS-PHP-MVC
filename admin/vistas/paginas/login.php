<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">inicio de session</p>

            <form method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="ingresoUsuario" placeholder="usuarios">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="ingresoPassword" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>

                <?php 


$ingreso=ctrPerfiles::ctrIngresoAdministradores();
                
                
                
                ?>




            </form>





        </div>
        <!-- /.login-box-body -->
    </div>



</body>
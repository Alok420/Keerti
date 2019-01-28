<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">

        <title></title>
        <?php include '../Common/CDN.php'; ?>
        <script>
            $(document).ready(function () {
                var pass1, pass2, username;
                $('#pass2').keyup(function () {
                    pass1 = $('#pass1').val();
                    pass2 = $('#pass2').val();
                    username = $('#username').val();
                    if (pass1 != "" && pass2 != "" && username != "") {
                        if (pass1 == pass2) {
                            $('#lblmsg').text("");
                            $('#btn').show();
                        } else {
                            $('#lblmsg').text("Both Passwords are not same");

                        }
                    } else {
                        $('#lblmsg').text("please fill both the fields");
                    }
                });
            });


        </script>
    </head>
    <body>
        <form action="passwordChangeControl.php" method="POST">
            <label>User name</label>
            <input type="hidden" value="login_credentials" name="tablename">
            <input type="text" name="username" id="username"><br>
            <label>New Password:</label>
            <input type="password" name="password" id="pass1"><br>
            <label>Re enter password:</label>
            <input type="password" id="pass2">
            <label id="lblmsg"></label>
            <input type="submit" id="btn" style="display: none;" value="change">
        </form>
    </body>
</html>

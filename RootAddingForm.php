<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <?php
        include './Common/CDN.php';
        include './Config/ConnectionObjectOriented.php';
        ?>
    </head>
    <body>

        <?php
        if (isset($_POST["name"]) && isset($_POST["password"])) {
            if (!empty($_POST["name"]) && !empty($_POST["password"])) {
                $sql = "select * from username_password_root where username='" . $_POST["name"] . "' and password='" . $_POST["password"]."'";
                
                $data = $conn->query($sql);
                
                if ($data->num_rows > 0) {
                     echo "processed";
                    ?>
                    <div class="container">
                        <h2>Root Branch registration form</h2>
                        <form action="controller/RootAdminRegistrationController.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Branch name:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="name">
                            </div>  
                            <div class="form-group">
                                <label for="pcontact">Primary contact:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="pcontact">
                            </div>  

                            <div class="form-group">
                                <label for="email">Username:</label>
                                <input type="text" class="form-control" id="email" placeholder="Enter email" name="user_name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember"> Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                    <?php
                } else {
                    echo 'Wrong username or password';
                }
            }
        } else {
            ?>
            <div class="container">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="name">User Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                    </div> 
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                    </div> 
                    <div class="form-group">
                        <button class="btn btn-default" type="submit">Submit</button>
                    </div> 
                </form>
            </div>
            <?php
        }
        ?>
    </body>
</html>

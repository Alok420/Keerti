<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <?php include './Common/CDN.php'; ?>
    </head>
    <body>

        <div class="container">
            <h2>Branch registration form</h2>
            <form action="controller/BranchRegistrationController.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Branch name:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="name">
                </div>  
                <div class="form-group">
                    <label for="pcontact">Primary contact:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="pcontact">
                </div>  
                <div class="form-group">
                    <label for="scontact">Secondary contact:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="scontact">
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

    </body>
</html>

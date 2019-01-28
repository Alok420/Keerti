<script>
    $(document).ready(function () {
        $(".remove").click(function () {
            $(".sidebar-accordion").hide();
            $(".showbtn").show();
        });
        $(".showbtn").click(function () {
            $(".sidebar-accordion").show();
            $(".showbtn").hide();
        });

    });
</script>
<div class="showbtn" ><span class="glyphicon glyphicon-tasks"></span></div>
<div class="container sidebar-accordion sidebarcontainer">
    <div class="remove"><span class="glyphicon glyphicon-remove"></span></div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default active" >
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Profile<span class="caret"></span></a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body"><a href="resume.php?candidate=<?php echo $_SESSION["loggedinid"];?>">My profile</a></div>
                <div class="panel-body"><a href="update/update_form.php">Update Profile</a></div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Job <span class="caret"></span></a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body"><a href="AllJobRequest.php">Job request/response</a></div>
                <div class="panel-body"><a href="Appointments.php">All Appointments</a></div>

            </div>
        </div>   
    </div>
</div>

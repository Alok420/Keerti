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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Profile <span class="caret"></span></a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body"><a href="EmployerProfile.php">My Profile</a></div>
                <div class="panel-body"><a href="UpdateProfile.php">Update Profile</a></div>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Job <span class="caret"></span></a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body"><a href="jobposting.php">Job Posting</a></div>
                <div class="panel-body"><a href="AllJobs.php">Posted Job</a></div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#appointment">Appointment <span class="caret"></span></a>
                </h4>
            </div>
            <div id="appointment" class="panel-collapse collapse">
                <div class="panel-body"><a href="setAppointMent.php">Set appointment</a></div>
                <div class="panel-body"><a href="AllAppointments.php">All Appointments</a></div>
                <div class="panel-body"><a href="AllFeedback.php">Feedback</a></div>


            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Candidates <span class="caret"></span></a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body"><a href="Job_Request_by_candidates.php">Job Request by candidates</a></div>
                <div class="panel-body"><a href="Job_Request_by_recruiters.php">Job Request by Recruiters</a></div>
                <div class="panel-body"><a href="chatpage.php">Chat</a></div>

            </div>
        </div>
    </div>
</div>

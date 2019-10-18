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
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Branches<span class="caret"></span></a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body"><a href="BrachAddingForm.php">Add new branch</a></div>
                <div class="panel-body"><a href="All_Branches.php">All branches</a></div>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Job <span class="caret"></span></a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body"><a href="jobposting.php">Post a Job</a></div>
                <div class="panel-body"><a href="AllJobs.php">Posted Job</a></div>
                <div class="panel-body"><a href="Job_Request_by_candidates.php">Candidate applications</a></div>
                <div class="panel-body"><a href="Job_Request_by_recruiters.php">My sort listed candidates</a></div>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Employers<span class="caret"></span></a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body"><a href="Allemployers.php">All employers</a></div>


            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#appointment">Appointments<span class="caret"></span></a>
                </h4>
            </div>
            <div id="appointment" class="panel-collapse collapse">
                <div class="panel-body"><a href="AllAppointments.php">All appointments</a></div>
                <div class="panel-body"><a href="AllFeedback.php">All feedbacks</a></div>

                <!--<div class="panel-body"><a href="AllJobs.php">Blocked Employers</a></div>-->
                <!--<div class="panel-body"><a href="AllJobs.php"></a></div>-->

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#student">Candidates<span class="caret"></span></a>
                </h4>
            </div>
            <div id="student" class="panel-collapse collapse">
                <div class="panel-body"><a href="AllStudents.php">All Candidates</a></div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Other <span class="caret"></span></a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body"><a href="chatpage.php">Chat</a></div>
                <div class="panel-body"><a href="AddFAQ.php">Add FAQ</a></div>
                <div class="panel-body"><a href="AddNews.php">Add NEWS</a></div>
                <div class="panel-body"><a href="AddPrivacyPolicy.php">Add Privacy police</a></div>
            </div>
        </div>
    </div>
</div>

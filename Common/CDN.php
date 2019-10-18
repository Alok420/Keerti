<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="shortcut icon" href="http://www.keertijobs.com/images/keertiwhite.png">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0"
        });
    });
</script>
<script src="excel/dist/jquery.table2excel.js"></script>
<script>
    $(document).ready(function () {


        $("#myTable tr td div").css({
            "height": "50px",
            "overflow": "hidden"
        });
        $("#myTable tr td div").dblclick(function () {
            $("#myTable tr td div").css({
                "height": "50px",
                "overflow": "hidden"
            });

            $(this).css({
                "height": "auto",
                "overflow": "visible"
            });
        });
        var doubleclickeditem;
        $("#myTable tr td").dblclick(function () {
            $("#myTable tr td").removeAttr("contenteditable");
            $("#myTable tr td").css({"border": "none"})
            $(this).attr("contenteditable", 'true');
            $(this).css({"border": "thin solid red"})
            doubleclickeditem = $(this);
        });

        $(".printExcel").click(function () {
            $(function () {
                $("#myTable").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true
                });
            });
        });
    });
    function clickTo(path) {
        window.location.href = "" + path;
    }
</script>
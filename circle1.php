<!DOCTYPE html>
<html>
    <head>
        <title>Circle1</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" media="mediatype and|not|only (expressions)">
        <style>
            .body{
                padding: 0;
                margin: 0;
                
            }
/*            *{
                border: thin solid red;
            }*/
            .circle1{
                position: absolute;
                top: 35%;
                left: 20%;
                padding: 10px;
                transform: translate(-50%, -50%);
                width: 160px;
                height: 160px;
                background: #FFF;
                border: 5px solid #00a65a;
                border-radius: 50%;
                overflow: hidden;
            }
            .wave1{
                position: relative;
                left: 0;
                width: 100%;
                height: 100%;
                background: #00a65a;
                border-radius: 50%;
                box-shadow: inset 0 0 50px rgba(0,0,0,.5);
            }
            .wave1:before,
            .wave1:after{
                content: '';
                position: absolute;
                width: 200%;
                height: 200%;
                top:0;
                left: 50%;
                transform: translate(-50%,-75%);
                background: #000;
            }
            .wave1:before{
                border-radius: 45%;
                background: rgba(255,255,255,1);
                animation: animate1 5s linear infinite;
            }
            .wave1:after{
                border-radius: 45%;
                background: rgba(255,255,255,1);
                animation: animate1 5s linear infinite;
            }
            @keyframes animate1{
                0%{
                    transform: translate(-50%,-75%) rotate(0deg);
                }
                100%{
                    transform: translate(-50%,-75%) rotate(360deg);
                }
            }
            @media screen and (max-width: 600px){
                .circle1{
                position: absolute;
                top: 22%;
                left: 45%;
                padding: 10px;
                transform: translate(-50%, -50%);
                width: 100px;
                height: 100px;
                background: #FFF;
                border: 5px solid #00a65a;
                border-radius: 50%;
                overflow: hidden;
            }
            }
        </style>
    </head>
    <body>
        <div class="body">
            <div class="circle1">
                <div class="wave1"></div>
            </div>
        </div>
    </body>
</html>
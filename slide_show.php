
<html>
    <head>
        <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
        <style>
            body
            {
                margin:0px;
            }
            #main
            {
                display:flex;
                justify-content:center;
            }
            #slide_show
            {
                max-width:843px;
                min-width:843px; 
                background-color:gray;
                border:1px solid black;
                width:50%;
                height:350px;
                margin-top:50px;
                display:flex;
            }
            #slide1 
            {
                max-width:805px; 
                width:100%;
                height:100%; 
                background-image: url("test1.jpg");
            }
            #slide2
            {
                max-width:805px;
                width:0%;
                height:100%;
                background-image: url("test1.jpg");
            }

            #slid_container
            {
                display:flex;
                width:100%;
                height:100%;
                background-color:gray;
            }
            #next_slide, #last_slide
            {
                opacity:.5;
                width: 20px;
                height:100%;
                background-color:yellow;
            }
            #slide1.clicked
            {
                transition: width 2s; 
                width: 0px;
            }
            #slide2.clicked
            {
                transition: width 2s;
                width: 100%;
            }
            #slide2.clicked2
            {
                transition: width 2s;
                width: 0px;
            }
            #slide1.clicked2
            {
                transition: width 2s;
                width: 100%;
            }
            #slide1.clicked3
            {
                max-width:805px;
                width:0%;
                height:100%;
                background-image: url("test1.jpg");
            }
            #slide2.clicked3
            {
                max-width:805px;
                width:100%;
                height:100%;
                background-image: url("test1.jpg");
            }



        </style>

        <script>
            var top_slide = true;
            function move_slide1(){
                console.log("2b1");
                $('#slide2').insertBefore('#slide1');
                $('#slide2').removeClass('clicked');
                $('#slide1').removeClass('clicked');
                $("#slide1").toggleClass('clicked3');
                $("#slide2").toggleClass("clicked3");

            }
            function move_slide2(){
                console.log("1B2");
                $('#slide1').insertBefore('#slide2');
                $('#slide2').removeClass('clicked2');
                $('#slide1').removeClass('clicked2');

            }

            $(document).ready(function() {
                $('#next_slide').on('click',function(e){
                    if(top_slide == true){
                        $("#slide1").toggleClass('clicked');
                        $("#slide2").toggleClass("clicked");
                        window.setTimeout(move_slide1, 2000);
                        top_slide = false;
                    }
                    else{
                        $('#slide2').removeClass('clicked3');
                        $('#slide1').removeClass('clicked3');
                        $("#slide1").toggleClass('clicked2');
                        $("#slide2").toggleClass("clicked2");
                        window.setTimeout(move_slide2, 2000);
                        top_slide = true;
                    } 
                });
            });


        </script>
    </head>
    <body>
        <div id="main">
            <div id="slide_show">
                <div id="last_slide">
                </div>
                <div id="slid_container">
                    <div id="slide1">
                    </div> 
                    <div id="slide2">
                    </div>
                </div>
                <div id="next_slide">
                </div>
            </div>
        </div>
    </body>
</html>

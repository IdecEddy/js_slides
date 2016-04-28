
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
                float:right;
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

        </style>

        <script>
            function move_slide1(){
                console.log("its time!");
                $('#side2').insertBefore('#slide1');
            }
            $(document).ready(function() {
                $('#next_slide').on('click',function(e){
                    console.log("next_slide was clicked");
                    $("#slide1").toggleClass('clicked');
                    $("#slide2").toggleClass("clicked");
                    window.setTimeout(move_slide1, 2000);
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

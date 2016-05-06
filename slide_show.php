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
                background-color:#353534;
            }

        </style>

        <script>
            //images_array is where we hold all the images we we want to cycle through. 
            var images_array = ["test1.jpg","test2.jpg","test3.jpg"];         
            var top_slide = true;
            var animating = false;
            // -1 so because JS counts from 1 when getting length.
            var images_array_length = images_array.length - 1;
            var images_array_count = 0;
            // the two functions that handel moving the slides position after/before a transition.
            function move_slide1(){
                $('#slide2').insertBefore('#slide1');
            }
            
            function move_slide2(){
                $('#slide1').insertBefore('#slide2');
            }

            $(document).ready(function(){
                $('#last_slide').on('click',function(e){
                    // if we are in the middel of a transition dont start another one.
                    if(animating === true) { return;} 
                    animating = true;

                    // this is where we check where we are in the array and see if we need to loop around or keep going.
                    if(images_array_count < images_array_length){
                        images_array_count++;
                    } else if (images_array_count >= images_array_length){
                        images_array_count = 0;
                    }
                    // if the top slide is 1 then we move slide1 to the right end of the container and prep it for a transition
                    if(top_slide === true){
                        
                        $("#slide2").css('background-image', 'url(' + images_array[images_array_count] + ')');
                        $('#slide1').animate({width:"0%"},1000, function(){
                            animating = false;
                            move_slide1();           
                        });
                        $('#slide2').animate({width:"100%"}, 1000, function(){
                            animating = false;
                        });
                        top_slide = false;
                    } else {
                        //else we do the reverse.
                        $("#slide1").css('background-image', 'url(' + images_array[images_array_count] + ')');
                        $('#slide2').animate({width:"0%"}, 1000, function(){
                            animating = false;
                            move_slide2();           
                        });
                        $('#slide1').animate({width:"100%"}, 1000, function(){
                            animating = false;
                        });
                        top_slide = true;
                    }
                });
            
                $("#next_slide").on("click", function(e){ 
                    //basicly the same as above but in reverse for the back button.
                    if(animating === true){ return;}
                    animating = true;
                    
                    if(images_array_count > 0){
                        images_array_count--;
                    } else if (images_array_count <= 0){
                        images_array_count = images_array_length;
                    }
                    if(top_slide === true){
                        move_slide1();
                        $("#slide2").css('background-image', 'url(' + images_array[images_array_count] + ')');
                        $("#slide2").animate({width:"100%"},1000, function(){
                            animating = false;
                        });
                        $("#slide1").animate({width:"0%"},1000, function(){
                            animating = false;
                        });
                        top_slide = false;
                    }
                    else{
                        move_slide2();
                        $("#slide1").css('background-image', 'url(' + images_array[images_array_count] + ')');
                        $("#slide2").animate({width:"0%"},1000, function(){
                            animating = false;                                  
                        });
                        $("#slide1").animate({width:"100%"},1000, function(){
                            animating = false;                                                    
                        });
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

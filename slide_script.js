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


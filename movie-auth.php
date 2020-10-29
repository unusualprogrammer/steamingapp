<?php
include 'dbconnection.php';

$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 

//Add Movie Auth
    if(isset($_POST['title']) || isset($_POST['genres']) || isset($_POST['description']) || isset($_POST['duration']) || isset($_POST['language']) || isset($_POST['release_year']) || isset($_POST['created_by']) || isset($_POST['slider_status']) || isset($_POST['movie']) || isset($_POST['trailer']) || isset($_POST['poster'])){
        
        $title = mysqli_real_escape_string($connect, $_POST['title']);
        $genres = mysqli_real_escape_string($connect, $_POST['genres']);
        $description = mysqli_real_escape_string($connect, $_POST['description']);
        $duration = mysqli_real_escape_string($connect, $_POST['duration']);
        $language= mysqli_real_escape_string($connect, $_POST['language']);
        $release_year = mysqli_real_escape_string($connect, $_POST['release_year']);
        $created_by = mysqli_real_escape_string($connect, $_POST['created_by']);
        $slider_status = mysqli_real_escape_string($connect, $_POST['slider_status']);
        
        $movie = $_FILES['movie']['name'];
        $tmp = $_FILES['movie']['tmp_name']; 
        
        move_uploaded_file($tmp, "../movies/".$movie);
        
        $trailer = $_FILES['trailer']['name'];
        $tmp = $_FILES['trailer']['tmp_name']; 
        
        move_uploaded_file($tmp, "../trailer/".$trailer);
        
        //Poster Image
        $poster = $_FILES['poster']['name'];
        $tmp = $_FILES['poster']['tmp_name']; 
        
        move_uploaded_file($tmp, "../../poster/".$poster);
        
        
        if(!empty($title) || !empty($genres) || !empty($description) || !empty($duration) || !empty($language) || !empty($release_year) || !empty($created_by) || !empty($movie) || !empty($trailer) || !empty($poster) || !empty($slider_status) ){
            
            $insert = $connect->query("INSERT INTO movies (title, description, duration, poster, trailer, movie,created_by, slider_status, release_year, language, genres) VALUES ('".$title."','".$description."','".$duration."','".$poster."','".$trailer."','".$movie."','".$created_by."','".$slider_status."','".$release_year."','".$language."','".$genres."')"); 
            
            if($insert){
                    $response['status'] = 1; 
                    $response['message'] = 'Form data submitted successfully!'; 
            }else{
                header("location:add-movie.php?message=Movie Upload Terminated!");
            }
        }
        
    }

// Return response 
echo json_encode($response);




?>

<!--
<script> 
    $('#imageuploadform').on('submit', function(e){
        var formData = new FormData(this); 
        $("#uploadbtn").prop("disabled", true); 
        $(".progress").show(); 
        $.ajax({
            type:'POST', 
            url: 'upload.php', 
            data: formData, 
            xhr: function(){
                var myXhr = $.ajaxSettings.xhr();; 
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress', progress, false);
                }
                return myXhr; 
            }, 
            cache: false, 
            contentType: false, 
            progressData: false, 
            
            success: function(data){
                $("#uploadbtn").prop("disabled", false); 
                $(".progress").hide(); 
                console.log(JSON.parse(data)); 
                var obj = JSON.parse(data); 
                for(var i=0; i<obj.success.length; i++){
                    $
                }
            }
        })
    })


</script>-->

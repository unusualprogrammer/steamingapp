<?php 
    session_start();
    //include 'includes/auth.php';
    include 'includes/dbconnection.php'; 

    
        if (!isset($_SESSION['ownerusername'])) {
            $_SESSION['msg'] = "You must log in first";
            header('location: ../login.php');
        }

?>
<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Zama Movies - Add Movie</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="https://iqonic.design/themes/Zama Moviesnew/dashboard/html/assets/images/favicon.ico" />
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <!--datatable CSS -->
   <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="assets/css/typography.css">
   <!-- Style CSS -->
   <link rel="stylesheet" href="assets/css/style.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="assets/css/responsive.css">
    
     <link rel="stylesheet" href="assets/css/fontawesome.css">
   <link rel="stylesheet" href="assets/css/fontawesome.min.css">
   <link rel="stylesheet" href="assets/1.3.0/css/line-awesome.min.css">
   <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/dripicons.css">
    
    
</head>

<body>
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar  -->
      <div class="iq-sidebar">
         <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="index.php" class="header-logo">
               <img src="assets/images/logo.png" class="img-fluid rounded-normal" alt="">
               <div class="logo-title">
                  <span class="text-primary text-uppercase">Zama Movies</span>
               </div>
            </a>
            <div class="iq-menu-bt-sidebar">
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="las la-bars"></i></div>
                  </div>
               </div>
            </div>
         </div>
          
          <!--Sidebar Starts Here -->
            <?php include 'includes/sidebar.php'; ?>
          <!--Sidebar Ends Here -->
      </div>
      <!-- TOP Nav Bar -->
            <?php include 'includes/topnav.php'; ?>
       <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Movie</h4>
                            <?php 
					                     
					                      if(isset($_GET['message']))
					                        {
					                            $message = $_GET['message'];
					                            echo '<script type="text/javascript">alert("'.$message.'");</script>'; 
					                        }
					           ?>
                            <span id="success_message" class="success_message"></span>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <form action="" method="post" enctype="multipart/form-data" id="add-movie" class="add-movie">
                           <div class="row">
                              <div class="col-lg-7">
                                 <div class="row">
                                    <div class="col-12 form-group">
                                       <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                        <span class="text-danger" id="title_error"></span>
                                    </div>
                                    <div class="col-12 form_gallery form-group">
                                       <label id="gallery2" for="form_gallery-upload">Upload Image</label>
                                       <input  id="form_gallery-upload" name="poster" class="form_gallery-upload"
                                          type="file" accept=".png, .jpg, .jpeg">
                                    </div>
                                        
                                                                
                                    <div class="col-md-6 form-group">
                                       <select class="form-control" name="genres" id="exampleFormControlSelect1">
                                        
                                           <?php 
                                            $category_query = mysqli_query($connect, "SELECT * FROM genres") or die(mysqli_error($connect));
                                            while($category_row = mysqli_fetch_array($category_query))
                                            {
                                        ?>
                                            <option value="Category">Choose Category</option>
                                           <option value="<?php echo $category_row['name']; ?>"><?php echo $category_row['name']; ?></option>
                                             <?php } ?>
                                        </select>
                                        <a href="add-category.php">Click to create Category</a>
                                    </div>
                                    
                                    <div class="col-sm-6 form-group">
                                       <select class="form-control" name="slider_status" id="exampleFormControlSelect2">
                                          <option disabled="">Add to Slider</option>
                                          <option value="1">Enable</option>
                                          <option value="0">Disable</option>
                                       </select>
                                    </div>
                                     
                                    <div class="col-12 form-group">
                                       <textarea id="description" name="description" rows="5" class="form-control"
                                          placeholder="Description" ></textarea>
                                        <span class="text-danger" id="description_error"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-5">
                                 <div class="d-block position-relative">
                                    <div class="form_video-upload">
                                        <input type="file" accept=".mp4, .3gp, .ogg, .wmv, .webm, .flv, .avi, .quicktime, .hdv, .mxf, .mpeg-tgs,.wav, .mpeg-4, .mkv, .mov, .mpg, .vob" name="movie">
                                       <p>Add Full Movie</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-6 form-group">
                                 <input type="text" class="form-control" name="release_year" id="release_year" placeholder="Release year" >
                                  <span class="text-danger" id="release_year_error"></span>
                              </div>
                              <div class="col-sm-6 form-group">
                                 <select class="form-control" name="language" id="exampleFormControlSelect3">
                                    <option selected disabled="">Choose Language</option>
                                    <option value="English">English</option>
                                    <option value="Dagbani">Dagbani</option>
                                 </select>
                              </div>
                              <div class="col-sm-12 form-group">
                                 <input type="text" class="form-control" name="duration" placeholder="Movie Duration" >
                              </div>
                               
                               <div class="col-sm-12 form-group">
                                 <input type="file" class="form-control" name="trailer" accept=".mp4, .3gp, .ogg, .wmv, .webm, .flv, .avi, .quicktime, .hdv, .mxf, .mpeg-tgs,.wav, .mpeg-4, .mkv, .mov, .mpg, .vob" size="" >
                                   <p>Upload Trailer</p>
                              </div>
                               
                               
                               <div class="col-sm-12 form-group">
                                 <input type="text" hidden value="<?php echo $_SESSION['ownerusername']; ?>" class="form-control" name="created_by" >
                                   
                              </div>
                               
                              
                              <div class="col-12 form-group ">
                                 <input type="submit" name="submit" id="submit" class="btn btn-success" value="SUBMIT"/>
                              </div>
                           </div>
                        </form>
                        
                         
                     </div>
                       <div class="form-group" id="progress" style="display:none;">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active"
                                     role="progressbar" aria-valuemin="0" aria-valuemax="100">

                                </div>
                            </div>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Wrapper END -->
   <!-- Footer -->
        <?php include 'includes/footer.php'; ?>
   <!-- Footer END -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="assets/js/jquery.min.js"></script>
   <script src="assets/js/popper.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <!-- Appear JavaScript -->
   <script src="assets/js/jquery.appear.js"></script>
   <!-- Countdown JavaScript -->
   <script src="assets/js/countdown.min.js"></script>
   <!-- Counterup JavaScript -->
   <script src="assets/js/waypoints.min.js"></script>
   <script src="assets/js/jquery.counterup.min.js"></script>
   <!-- Wow JavaScript -->
   <script src="assets/js/wow.min.js"></script>
   <!-- Select2 JavaScript -->
   <script src="assets/js/select2.min.js"></script>
   <!-- Slick JavaScript -->
   <script src="assets/js/slick.min.js"></script>
   <!-- Owl Carousel JavaScript -->
   <script src="assets/js/owl.carousel.min.js"></script>
   <!-- Magnific Popup JavaScript -->
   <script src="assets/js/jquery.magnific-popup.min.js"></script>
   <!-- Smooth Scrollbar JavaScript -->
   <script src="assets/js/smooth-scrollbar.js"></script>
   <!-- Chart Custom JavaScript -->
   <script src="assets/js/chart-custom.js"></script>
   <!-- Custom JavaScript -->
   <script src="assets/js/custom.js"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script>
        $(document).ready(function(){
    // Submit form data via Ajax
    $("#add-movie").on('submit', function(e){
        e.preventDefault();
       
        var count_error = 0 
        
        if($("#title").val() == ''){
            $("#title_error").text("Title required")
            count_error++
        }
        else{
            $("#title_error").text("")
        }
        
        if(count_error == 0){
            
        $.ajax({
            type: 'POST',
            url: 'includes/movie-auth.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('#submit').attr("disabled","disabled");
                $('#progress').css("display","block");
            },
            success: function(response){ //console.log(response);
                 $('.statusMsg').html('');
                if(response.status == 1){
                    $('#add-movie')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#add-movie').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                var percentage = 0
                
                var timer = setInterval(() => {
                    percentage = percentage + 1 
                    progress_bar_process(percentage,timer)
                }, 1000); 
                
               }
        });
        }
        else {
            return false
        }
    });
});
        
        function progress_bar_process(percentage,timer){
            $(".progress-bar").css('width',percentage + '%')
            if(percentage > 100){
                clearInterval(timer)
                $("#add-movie")[0].reset()
                $("#progress").css("display", "block")
                $(".progress-bar").css("width", "100%")
                $("#submit").attr("disabled", false)
                $("#success_message").html("<div class='alert alert-success'>Data Saved</div>")
                setTimeout(() => {
                    $("#success_message").html("")
                }, 5000);
                
            }
        }
 
    </script>

   
    </body>

</html>
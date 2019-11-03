<!DOCTYPE html>
<html lang="en" dir="ltr">
  <h
  ead>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen"/>
</head>

<body>




  <div class="header">
      <div class="main">
      <div class="nav_menu">
        <ul class="menu">
          <li> <a href="#">OUR LOGO </a> </li>
          <li> <a href="#">HOME </a> </li>
          <li><a href="#"> OPTION-1</a> </li>
          <li><a href="#">OPTION-2</a> </li>
          <li><a href="#">OPTION-3</a> </li>
        </ul>
      </div>
   </div>
  </div>


    <section class="slider">
     <div class="flexslider">
       <ul class="slides">
         <li>
           <img class="s_img" src="/images/slide3.jpg"/>
         </li>

         <li>
           <img class="s_img" src="/images/slide2.jpg"/>
         </li>
         <li>
           <img class="s_img" src="/images/slide4.jpg"/>
         </li>
       </ul>
     </div>
   </section>


  <div class="main">
      <div class="third_block">
              <div class="block pic1">
                <div class="hover">   <p class="h_p">
                  <form method="get">
                    <button margin="150px" class="btn btn-success" type="submit" formaction="SolarData">Learn More</button>
                  </form>
                 </p> </div>
                    <p> Solar Cell Data</p>
              </div>

              <div class="block pic2">
                <div class="hover">     <p class="h_p">  <a href="wind_mill_data.html">Learn More ></a> </p>  </div>
                    <p>Wind Mill Data</p>
              </div>

              <div class="block pic3">
                <div class="hover">       <p class="h_p">  <a href="piezo_data.html">Learn More ></a> </p> </div>
                    <p> Piezo Data</p>
              </div>

              <div class="block pic4">
                <div class="hover">      <p class="h_p">  <a href="hydro_electricity_data.html">Learn More ></a> </p> </div>
                  <p> Hydro Electricity Data</p>
              </div>

      </div>
</div>


<div class="footer">

<div class="main">


  <ul class="f_menu">
    <li> <a href="#">About Us</a> </li>
    <li> <a href="#">Contact </a> </li>
  </ul>

</div>

</div>







     <!-- jQuery -->
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
     <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>



    <script type="text/javascript">
      $(function(){
        SyntaxHighlighter.all();
      });
      $(window).load(function(){
        $('.flexslider').flexslider({
          animation: "slide",
          start: function(slider){
            $('body').removeClass('loading');
          }
        });
      });
    </script>


</body>
</html>

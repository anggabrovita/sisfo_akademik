<div class="nav-footer py-sm-4 py-3">
      <div class="container-fluid">
        <div class="buttom-nav ">
          <nav class="border-line py-2">
            <ul class="nav justify-content-center">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Beranda <span class="sr-only">(current)</span></a>
              </li>
                <li class="nav-item">
                  <a href="#about" class="nav-link scroll" >Tentang</a>
                </li>
                <li class="nav-item">
                  <a href="#team" class="nav-link scroll">Team</a>
                </li>
                <li class="nav-item">
                  <a href="#contact" class="nav-link scroll">Kontak</a>
                </li>
                <li class="nav-item">
                  <a href="#stats" class="nav-link scroll">Stats</a>
                </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <footer class="py-3">
      <div class="container">
        <div class="copy-agile-right text-center">
          <div class="list-social-icons text-center py-lg-4 py-md-3 py-3">
            <ul>
              <li><a href="<?= $site->facebook ?>"><span class="fab fa-facebook-f"></span></a></li>
              <li><a href="<?= $site->instagram ?>"><span class="fab fa-instagram"></span></a></li>
              <li><a href="<?= $site->instagram ?>"><span class="fab fa-linkedin"></span></a></li>
            </ul>
          </div>
          <p> 
            &copy;<script>document.write(new Date().getFullYear());</script> Sistem Informasi Akademik with <i class="fa fa-heart" aria-hidden="true"></i> by 
            <a href="" target="_blank">RINDU</a>
          </p>
        </div>
      </div>
    </footer>
    <!--//footer-->
    <!--model-->
    <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLiveLabel" data-blast="color">ClassWork</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="<?= base_url('assets/template/') ?>images/b2.jpg" alt="" class="img-fluid">
            <p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae,
              eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellu
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!--//model-->
    <!--js working-->
    <script src='<?= base_url('assets/template/') ?>js/jquery-2.2.3.min.js'></script>
    <!--//js working--> 
    <!--blast colors change-->
    <script src="<?= base_url('assets/template/') ?>js/blast.min.js"></script>
    <!--//blast colors change-->
    <!--responsiveslides banner-->
    <script src="<?= base_url('assets/template/') ?>js/responsiveslides.min.js"></script>
    <script>
      // You can also use "$(window).load(function() {"
      $(function () {
      	// Slideshow 4
      	$("#slider4").responsiveSlides({
      		auto: true,
      		pager:false,
      		nav:true ,
      		speed: 900,
      		namespace: "callbacks",
      		before: function () {
      			$('.events').append("<li>before event fired.</li>");
      		},
      		after: function () {
      			$('.events').append("<li>after event fired.</li>");
      		}
      	});
      
      });
    </script>
    <!--// responsiveslides banner-->		  
    <!--responsive tabs-->	 
    <script src="<?= base_url('assets/template/') ?>js/easy-responsive-tabs.js"></script>
    <script>
      $(document).ready(function () {
      $('#horizontalTab').easyResponsiveTabs({
      type: 'default', //Types: default, vertical, accordion           
      width: 'auto', //auto or any width like 600px
      fit: true,   // 100% fit in a container
      closed: 'accordion', // Start closed if in accordion view
      activate: function(event) { // Callback function if tab is switched
      var $tab = $(this);
      var $info = $('#tabInfo');
      var $name = $('span', $info);
      $name.text($tab.text());
      $info.show();
      }
      });
      });
       
    </script>
    <!--// responsive tabs-->	
    <!--About OnScroll-Number-Increase-JavaScript -->
    <script src="<?= base_url('assets/template/') ?>js/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/template/') ?>js/jquery.countup.js"></script>
    <script>
      $('.counter').countUp();
    </script>
    <!-- //OnScroll-Number-Increase-JavaScript -->	  
    <!-- start-smoth-scrolling -->
    <script src="<?= base_url('assets/template/') ?>js/move-top.js"></script>
    <script src="<?= base_url('assets/template/') ?>js/easing.js"></script>
    <script>
      jQuery(document).ready(function ($) {
      	$(".scroll").click(function (event) {
      		event.preventDefault();
      		$('html,body').animate({
      			scrollTop: $(this.hash).offset().top
      		}, 900);
      	});
      });
    </script>
    <!-- start-smoth-scrolling -->
    <!-- here stars scrolling icon -->
    <script>
      $(document).ready(function () {
      
      	var defaults = {
      		containerID: 'toTop', // fading element id
      		containerHoverID: 'toTopHover', // fading element hover id
      		scrollSpeed: 1200,
      		easingType: 'linear'
      	};
      
      
      	$().UItoTop({
      		easingType: 'easeOutQuart'
      	});
      
      });
    </script>
    <!-- //here ends scrolling icon -->
    <!--bootstrap working-->
    <script src="<?= base_url('assets/template/') ?>js/bootstrap.min.js"></script>
    <!-- //bootstrap working-->
  </body>
</html>
<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
?>
<!-- footer -->
<div class="footer_agileinfo_w3">
  <div class="footer_inner_info_w3ls_agileits">
    <div class="col-md-3 footer-left">
      <h2><a href="index.html"><span>C</span>Slim Shoes </a></h2>
      <p>We are one of the biggest shoe store out there. Follow us on social medias to se our new collections.<br> &copy; CSLIM</p>
      <ul class="social-nav model-3d-0 footer-social social two">
        <li>
          <a href="#" class="facebook">
            <div class="front"><i class="fa fa-facebook"></i></div>
            <div class="back"><i class="fa fa-facebook"></i></div>
          </a>
        </li>
        <li>
          <a href="#" class="twitter">
            <div class="front"><i class="fa fa-twitter"></i></div>
            <div class="back"><i class="fa fa-twitter"></i></div>
          </a>
        </li>
        <li>
          <a href="#" class="instagram">
            <div class="front"><i class="fa fa-instagram"></i></div>
            <div class="back"><i class="fa fa-instagram"></i></div>
          </a>
        </li>
        <li>
          <a href="#" class="pinterest">
            <div class="front"><i class="fa fa-linkedin"></i></div>
            <div class="back"><i class="fa fa-linkedin"></i></div>
          </a>
        </li>
      </ul>
    </div>
    <div class="col-md-9 footer-right">
      <div class="sign-grds">
        <div class="col-md-4 sign-gd">
          <h4>Our <span>Information</span> </h4>
          <ul>
                <?php renderRegion("navbar") ?>
          </ul>
        </div>

        <div class="col-md-5 sign-gd-two">
          <h4>Store <span>Information</span></h4>
          <div class="address">
            <div class="address-grid">
              <div class="address-left">
                <i class="fa fa-phone" aria-hidden="true"></i>
              </div>
              <div class="address-right">
                <h6>Phone Number</h6>
                <p>+467321422</p>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="address-grid">
              <div class="address-left">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </div>
              <div class="address-right">
                <h6>Email Address</h6>
                <p>Email :<a href=""> support@cslim.com</a></p>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="address-grid">
              <div class="address-left">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
              </div>
              <div class="address-right">
                <h6>Location</h6>
                <p>
                    Sweden,
                    Skövde,
                    Granatvägen 1c
                </p>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">


        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
</div>
<!-- //footer -->
  <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->

<script type="text/javascript">
  jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
      event.preventDefault();
      $('html,body').animate({
        scrollTop: $(this.hash).offset().top
      }, 1000);
    });
  });
</script>

</body>

</html>

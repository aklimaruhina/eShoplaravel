<footer>
        <div class="container">
        <hr>
            <div class="row">
              <div class="col-sm-3 footer-block">
                <h5 class="footer-title">Information</h5>
                <ul class="list-unstyled ul-wrapper">
                  <li><a href="about-us.html">About Us</a></li>
                  <li><a href="checkout.html">Delivery Information</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Terms &amp; Conditions</a></li>
                  <li><a href="#">Returns</a></li>
                  <li><a href="#">Site Map</a></li>
                  <li><a href="#">Wish List</a></li>
                </ul>
              </div>
              <div class="col-sm-3 footer-block">
                <h5 class="footer-title">Why Choose</h5>
                <ul class="list-unstyled ul-wrapper">
                  <li><a href="contact.html">Contact Us</a></li>
                  <li><a href="#">Product Recall</a></li>
                  <li><a href="#">Gift Vouchers</a></li>
                  <li><a href="#">Returns and Exchanges</a></li>
                  <li><a href="#">Shipping Options</a></li>
                  <li><a href="#">Help & FAQs</a></li>
                  <li><a href="#">Sale Only Today</a></li>
                </ul>
              </div>
              <div class="col-sm-3 footer-block">
                <h5 class="footer-title">My Account</h5>
                <ul class="list-unstyled ul-wrapper">
                  <li><a href="#">Sign in</a></li>
                  <li><a href="gift.html">Gift Vouchers</a></li>
                  <li><a href="affiliate.html">Affiliates</a></li>
                  <li><a href="#">View Cart</a></li>
                  <li><a href="#">Checkout</a></li>
                  <li><a href="#">Track My Order</a></li>
                  <li><a href="#">Help</a></li>
                </ul>
              </div>
              <div class="col-sm-3 footer-block">
                <div class="content_footercms_right">
                  <div class="footer-contact">
                    <h5 class="contact-title footer-title">Contact Us</h5>
                    <ul class="ul-wrapper">
                      <li><i class="fa fa-map-marker"></i><span class="location2"> Warehouse & Offices,<br>
                        12345 Street name, California<br>
                        USA</span></li>
                      <li><i class="fa fa-envelope"></i><span class="mail2"><a href="#">info@localhost.com</a></span></li>
                      <li><i class="fa fa-mobile"></i><span class="phone2">+91 0987-654-321<br>+91 0987-654-321</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="footer-top-cms">
                <div class="col-sm-7">
                  <div class="newslatter">
                    <form>
                      <h5>Sign up for our Newsletter</h5>
                      <div class="input-group">
                        <input type="text" class=" form-control" placeholder="Your-email@website.com">
                        <button type="submit" value="Sign up" class="btn btn-large btn-primary">Subscribe</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="footer-social">
                    <h5>Social</h5>
                    <ul>
                      <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                      <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li class="gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>    
        </div>

        <a id="scrollup">Scroll</a> 
    </footer>
    
    <div class="footer-bottom">
        <div class="container">
            <div class="copyright">Powered By &nbsp;<a class="yourstore" href="http://www.lionode.com/">lionode &copy; 2017 </a> </div>
            <div class="footer-bottom-cms">
              <div class="footer-payment">
                <ul>
                  <li class="mastero"><a href="#"><img alt="" src="image/payment/mastero.jpg"></a></li>
                  <li class="visa"><a href="#"><img alt="" src="image/payment/visa.jpg"></a></li>
                  <li class="currus"><a href="#"><img alt="" src="image/payment/currus.jpg"></a></li>
                  <li class="discover"><a href="#"><img alt="" src="image/payment/discover.jpg"></a></li>
                  <li class="bank"><a href="#"><img alt="" src="image/payment/bank.jpg"></a></li>
                </ul>
              </div>
            </div>
        </div>
    </div>


        <script src="{{ asset('js/parally.js') }}"></script> 
        <script>
            $('.parallax').parally({offset: -40});
        </script>
      <script>
        $(document).ready(function(){
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $( ".remove" ).on( "click" , function() {
            var id = $(this).attr( "data-id" );
            $.ajax({
              type:'POST',
              url: "/carts/cart-clear",
              data:  {"_token": "{{ csrf_token() }}"},
              success: function (data) {
                $("#cart_id_" + id).remove();
               // $('#messages').html('<div class="alert alert-danger col-sm-12" >' + data.message + '</div>');
              },
              error: function(data){
                console.log('Error:', data);
              }
            })
          });
        });
        function addToCart(id){
          $.ajax({
            type: "POST",
            url: "/carts/cart-add",
            data: {"_token": "{{ csrf_token() }}", "product_id": id},
            dataType: 'json',
            success: function(data){
              console.log(data.message);
              alert_float('success', data.message);
              $('.cart_total').html(data.totalItems);
            }
          })
        }
        function alert_float(type, message, timeout) {
            var aId, el;
            aId = $("body").find('float-alert').length;
            aId++;
            aId = 'alert_float_' + aId; 
            el = $('<div id="' + aId + '" class="float-alert animated fadeInRight col-xs-11 col-sm-4 alert alert-' + type + '"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="fa fa-bell-o" data-notify="icon"></span><span class="alert-title">' + message + '</span></div>');
            $("body").append(el);
            setTimeout(function() {
                $('#' + aId).hide('fast', function() { $('#' + aId).remove(); });
            }, timeout ? timeout : 3500);
        }
  </script>
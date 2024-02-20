<!-- jquery -->
<script src="./Public/js/jquery-3.7.1.min.js"></script>
<!-- Modernizr js -->
<script src="./Public/js/vendor/modernizr-2.8.3.min.js?"></script>
<!-- toast js -->
<script src="./Public/js/toast.script.js"></script>
<?php
echo (isset($_GET['login_success']) && $_GET['login_success'] == 1) ? alert('Success', 'Logged in successfully', 'success') : '';
echo (isset($_GET['confirm_email_success']) && $_GET['confirm_email_success'] == 1) ? alert('Success', 'Email confirmation successful', 'success') : '';
echo (isset($_GET['register_send_mail_success']) && $_GET['register_send_mail_success'] == 1) ? alert('Success', 'Account created successfully, please confirm email', 'success') : '';
echo (isset($_GET['register_send_mail_failed']) && $_GET['register_send_mail_failed'] == 1) ? alert('Success', 'Email sending failed', 'warning') : '';
echo (isset($_GET['register_failed']) && $_GET['register_failed'] == 1) ? alert('Error', 'Account creation failed', 'error') : '';
echo (isset($_GET['data_empty']) && $_GET['data_empty'] == 1) ? alert('Warning', 'Content cannot be empty', 'warning') : '';
echo (isset($_GET['register_error']) && $_GET['register_error'] == 1) ? alert('Error', 'Email or Username already exists', 'error') : '';
echo (isset($_GET['login_failed']) && $_GET['login_failed'] == 1) ? alert('Error', 'Login failed because the password account is incorrect or the account has not been activated', 'error') : '';
echo (isset($_GET['forgot_password_success']) && $_GET['forgot_password_success'] == 1) ? alert('Success', 'Password sent successfully', 'success') : '';
echo (isset($_GET['data_empty']) && $_GET['data_empty'] == 1) ? alert('Warning', 'Content cannot be empty', 'warning') : '';
?>
<!-- lazysizes -->
<!-- <script src="./Public/js/lazyload.js"></script>
<script src="./Public/js/lazysizes.min.js" async=""></script>
<script>
    $(document).ready(function() {
        // lazyload();
        document.querySelectorAll('img[data-src]').forEach(img => {
            img.setAttribute('src', img.getAttribute('data-src'));
        });
    });
</script> -->
<!-- jQuery-V1.12.4 -->
<script src="./Public/js/vendor/jquery-1.12.4.min.js"></script>
<script>
    jQuery.event.special.touchstart = {
        setup: function(_, ns, handle) {
            this.addEventListener("touchstart", handle, {
                passive: true
            });
        }
    };
    jQuery.event.special.touchmove = {
        setup: function(_, ns, handle) {
            if (ns.includes("noPreventDefault")) {
                this.addEventListener("touchmove", handle, {
                    passive: false
                });
            } else {
                this.addEventListener("touchmove", handle, {
                    passive: true
                });
            }
        }
    };
</script>
<!-- Popper js -->
<script src="./Public/js/vendor/popper.min.js"></script>
<!-- Bootstrap V4.1.3 Fremwork js -->
<script src="./Public/js/bootstrap.min.js"></script>
<!-- Ajax Mail js -->
<script src="./Public/js/ajax-mail.js"></script>
<!-- Meanmenu js -->
<script src="./Public/js/jquery.meanmenu.min.js"></script>
<!-- Wow.min js -->
<script src="./Public/js/wow.min.js"></script>
<!-- Slick Carousel js -->
<script src="./Public/js/slick.min.js"></script>
<!-- Owl Carousel-2 js -->
<script src="./Public/js/owl.carousel.min.js"></script>
<!-- Magnific popup js -->
<script src="./Public/js/jquery.magnific-popup.min.js"></script>
<!-- Isotope js -->
<script src="./Public/js/isotope.pkgd.min.js"></script>
<!-- Imagesloaded js -->
<script src="./Public/js/imagesloaded.pkgd.min.js"></script>
<!-- Mixitup js -->
<script src="./Public/js/jquery.mixitup.min.js"></script>
<!-- Countdown -->
<script src="./Public/js/jquery.countdown.min.js"></script>
<!-- Counterup -->
<script src="./Public/js/jquery.counterup.min.js"></script>
<!-- Waypoints -->
<script src="./Public/js/waypoints.min.js"></script>
<!-- Barrating -->
<script src="./Public/js/jquery.barrating.min.js"></script>
<!-- Jquery-ui -->
<script src="./Public/js/jquery-ui.min.js"></script>
<!-- Venobox -->
<script src="./Public/js/venobox.min.js"></script>
<!-- Nice Select js -->
<script src="./Public/js/jquery.nice-select.min.js"></script>
<!-- ScrollUp js -->
<script src="./Public/js/scrollUp.min.js"></script>
<!-- Main/Activator js -->
<script src="./Public/js/main.js"></script>
<!-- jquery validate -->
<script src="./Public/js/jquery.validate.min.js"></script>
<!-- jquery confirm -->
<script src="./Public/js/jquery-confirm.min.js"></script>
<!-- Custom -->
<script src="./Public/js/customs/validate_form.js?<?php echo time(); ?>"></script>
<script src="./Public/js/customs/ajax/search_product.js?<?php echo time(); ?>"></script>
<script src="./Public/js/customs/ajax/reply_comment.js?<?php echo time(); ?>"></script>
<script src="./Public/js/customs/ajax/load_size_change_color.js?<?php echo time(); ?>"></script>
<script src="./Public/js/customs/ajax/load_district.js?<?php echo time(); ?>"></script>
<script src="./Public/js/customs/ajax/add_to_cart.js?<?php echo time(); ?>"></script>
<script src="./Public/js/Customs/main.js?<?php echo time(); ?>"></script>
<script src="./Public/js/custom.js?<?php echo time(); ?>"></script>
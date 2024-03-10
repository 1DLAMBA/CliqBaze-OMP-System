</div><!-- end row -->
</div><!-- end container -->
</section>

<?php
use App\classes\Site;
$ob = Site::displaySocialLink();
$data = mysqli_fetch_assoc($ob);
?>
<footer class="footer">
<div class="footer-main">
    <div class="footer-links">
        <ul>
        <li> <a href="index.html" class="nav-link">Home</a></li>
        <li> <a href="About.html" class="nav-link">About</a></li>
        <li> <a href="Shop.html" class="nav-link">Shop</a></li>
        <li> <a href="Bas.html" class="nav-link">Become a seller</a></li>
        <li> <a href="Contact.html" class="nav-link">Contact</a></li>
    </ul>
    </div>
    <div class="footer-contact">
        Tel: 08069592613<br>
        Email:Cliqbaze@gmail.com<br><br>
        <input type="text" id="enquiries" name="enquiries" placeholder="Message Us"><button>Submit</button>

    </div>
    <div class="footer-logo">
        <img src="LOGO2.png" width="100px">
    </div>
</div>
</footer><!-- end footer -->

<div class="dmtop">Scroll to Top</div>

</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/tether.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
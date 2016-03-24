<footer>
	<div class="footer-inner">
		<p>Created by <a href="http://andrewbowe.com">Andrew Bowe</a></p>
	</div>
</footer><!-- Preloader -->
<script type="text/javascript">
    //<![CDATA[
        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out the loading animation
            $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
        })
    //]]>
</script>
</body>
</html>
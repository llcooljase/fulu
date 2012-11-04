<?php

/**

 * The template for displaying the footer.

 *

 * Contains the closing of the id=main div and all content

 * after.  Calls sidebar-footer.php for bottom widgets.

 *

 * @package WordPress

 * @subpackage Twenty_Ten

 * @since Twenty Ten 1.0

 */

?>

	



<?php

	/* A sidebar in the footer? Yep. You can can customize

	 * your footer with four columns of widgets.

	 */

	get_sidebar( 'footer' );

?>



			<footer class="innerfooter">

<aside class="placeholder">

 <p class="pluck"><img src="<?php bloginfo( 'template_directory' ); ?>/images/fulu.png" /></p> 

    <aside class="follow"><aside class="socialnetworks"><a href="http://www.facebook.com/pages/FuLumailcom/291322157583448" class="fb" target="_blank"></a><a href="https://twitter.com/#!/fulumaster" class="tw" target="_blank"></a></aside>

    </aside>

    <p class="footertxt">Copyrights fulumail.com. All right reserved. We are not a hate mail service. <br>

Our goal is not to achieve a form of cyber bullying or anything of the type but rather a forum to mainstream anonymous emotions

<br>

<a href="http://www.61demoserver.com/fulumail/rights.html">Rights and Regulations</a></p>

    </aside>



</footer>

</div>



<?php

	/* Always have wp_footer() just before the closing </body>

	 * tag of your theme, or you will break many plugins, which

	 * generally use this hook to reference JavaScript files.

	 */



	wp_footer();

?>

</body>

</html>


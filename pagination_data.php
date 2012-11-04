<?php
if(!$_GET) {echo "Hm. Seems too many people have used this website.";}
else {
	$o=$_GET['o'];

	if($o > 2) {
		echo '
<div class="medium_text">Timeline</div>
<div class="p_text">Here\'s our timeline:<br><br>
We\'re looking to launch a small, invite-only version on our own campus in October, and run it for about a month, during which time we\'ll inevitably make revisions and improve our product. <br>
<br>
If all goes well, we\'ll recruit a few friends to help us code, and then with the help of a few mentors and advisors, we\'ll spread to a selected list of ten or so colleges in December.
<br>
<br>
If that goes well, with a help of a few more mentors and advisors, we\'ll then expand to a lot more campuses. </div>
<div class="tl">
<div class="tl_box a"><span class="tl_date">Jul. - Sept.</span><span class="tl_desc">Build beta version of service.</span></div>
<div class="tl_box"><span class="tl_date">Oct. - Nov.</span><span class="tl_desc tl_desc2">Test service among Princeton community + make changes.</span></div>
<div class="tl_box"><span class="tl_date">Dec. - Jan.</span><span class="tl_desc">Expand to ten or so more schools.</span></div>
<div class="tl_box b"><span class="tl_date">2013</span><span class="tl_desc">Take over the world?</span></div>
</div>
<a href="#fifth"><div class="prev_slide"><span class="n_back">Back to the previous slide</span></div></a>
<a href="#seventh"><div class="next_slide"><span class="n_icon"><span class="icon_star"></span></span><span class="n_text">Where Do I Come In?</span></div></a>';
	}
}
<div id="sidebar" class="col-md-2 col-md-pull-10">
    <div class="con-interpretation sidebar-container">
    <?php 
        $conCount = wp_count_posts('con_interpretation_2')->publish;
	$modulus = $conCount % 50;
	$remaining = $conCount - $modulus;
	$linkContent = "";
        for ($i = $conCount; $i > $remaining; $i--) {
	    $linkContent .= '<a href="' . site_url() . '/' . get_post_type($post->ID) . '/' . $i . '">釋字第 ' . $i . ' 號解釋</a><br>';
	}
	$panelTitle = ($remaining + 1);
	$rounds = $remaining / 50;
    ?>
        <div class="panel panel-default">
	    <div class="panel-heading">
	    <a data-toggle="collapse" role="button" href="#<?php echo ($remaining + 1);?>">
		    <h4 class="panel-title">釋字第 <?php echo $panelTitle; ?> 號以上</h4>
            </a>
	    </div>
	    <div class="collapse" id="<?php echo ($remaining + 1);?>">
                <div class="panel-body">
                    <?php echo $linkContent; ?>
                </div>
            </div>
	</div>

    <?php
	for ($j = 0; $j < $rounds; $j++) {
	    $linkContent = "";
	    $start = $i;
	    $end = $start - 50 + 1;
	    for (; $i >= $end; $i--) {
	        $linkContent .= '<a href="' . site_url() . '/' . get_post_type($post->ID) . '/' . $i . '">釋字第' . $i . '號解釋</a><br>';
	    }
	    $panelTitle = $end . "-" . "$start"; ?>

            <div class="panel panel-default">
	        <div class="panel-heading">
	        <a data-toggle="collapse" role="button" href="#<?php echo $panelTitle; ?>">
	    	    <h4 class="panel-title">釋字第 <?php echo $panelTitle; ?> 號</h4>
	    	</a>
	        </div>
	        <div class="collapse" id="<?php echo $panelTitle; ?>">
                    <div class="panel-body">
                        <?php echo $linkContent; ?>
                    </div>
                </div>
	    </div>
    <?php
	}	
    ?>

    </div>
</div>

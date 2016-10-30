<div class="post clearfix">

	<div class="post-content">
		<div class="post-title">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="post-excerpt"><?php the_content(); ?></div>		
                <?php
                    $conDate = get_field_object('con_date');
		    if ($conDate['value'] != "") { ?>
                        <div class="con-date">
                            <p><strong>解釋公布日期：</strong><?php echo $conDate['value']; ?></p>
                        </div>
                <?php        
		    }
		    $conPoint = get_field_object('con_point');
		    if ($conPoint['value'] != "") { ?>
                        <div class="con-point">
                            <strong>解釋爭點：</strong>
                            <?php echo $conPoint['value']; ?>
                        </div>
                <?php
		    }
		    $conMain = get_field_object('con_main');
		    if ($conMain['value'] != "") { ?>
		        <div class="con-main">
			    <strong>解釋文：</strong>
                            <?php echo $conMain['value']; ?>
			</div>
                <?php
		    }
		    $conReason = get_field_object('con_reason');
		    if ($conReason['value'] != "") { ?>
                        <div class="con-reason">
                            <strong>理由書：</strong>
                            <?php echo $conReason['value']; ?>
                        </div>
                <?php
		    }
		    $conFact = get_field_object('con_fact');
		    if ($conFact['value'] != "") { ?>
		        <div class="con-fact">
			    <strong>事實摘要：</strong>
                            <?php echo $conFact['value']; ?>
			</div>
                <?php
		    }
		    $conRelate = get_field_object('con_related');
		    if ($conRelate['value'] != "") { ?>
                        <div class="con-related">
                            <strong>相關法條：</strong>
                            <p><?php echo $conRelate['value']; ?></p>
                        </div>
                <?php
                    }
		    $conAttach = get_field_object('con_attach');
		    if ($conAttach['value'] != "") { ?>
                        <div class="con-attach">
			<strong>附件 <a href="<?php global $post; echo site_url() . "/conFiles/" . $post->post_name . "_docs.zip"; ?>">(打包下載)</a></strong>
                            <p><?php echo $conAttach['value']; ?></p>
                        </div>
                <?php
		    }
		    $conURL = get_field_object('con_url');
		    if ($conURL['value'] != "") { ?>
                        <div class="con-url">
                            <strong>來源：</strong><a href="<?php echo $conURL['value']; ?>" target="_blank">司法院大法官解釋</a>
                        </div>
                <?php
	            }
                ?>
		<div class="post-tags clearfix"><?php the_tags( '', '', ''); ?></div>
	</div>

</div>


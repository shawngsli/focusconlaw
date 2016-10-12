<?php get_header(); ?>

	<div id="page-wrap" class="container">
	
		<div id="content" class="sixteen columns">
                <h1><?php the_title();?></h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
				<div class="entry">
	
					<?php the_content(); ?>
	
					<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
	
				</div>
	
			</article>
			
			<?php if(!$data['check_disablecomments']) { ?>
				<?php comments_template(); ?>
			<?php } ?>
	
			<?php endwhile; endif; ?>
		</div> <!-- end content -->
	
	</div> <!-- end page-wrap -->
<script type="text/javascript">
var cal = document.getElementById("hoff-submit");

var result = document.getElementById("result");

var formula = document.getElementById("formula");

cal.addEventListener("click", hoffCalc);

function hoffCalc() {

  function addCell(row, text) {
    var cell = row.insertCell(-1);
    cell.appendChild(document.createTextNode(text));
  }

  r = 0.05;
  var annual = document.getElementById("annual-amount-paid").value;
  var years = document.getElementById("years").value;
  var days = document.getElementById("days").value;

  var formula_string = "";

  console.log(days);

  var current_hoff = 0;

  var sum = 0;

  var current_year_sum = 0;
  var old_tbody = document.getElementsByTagName("tbody")[0];
  var new_tbody = document.createElement("tbody");
  
  var row = null;

  for (var i = 0; i < years; i++) {
    current_year_sum = annual / (1 + i * r);
    sum += current_year_sum;
    current_hoff = current_year_sum / annual;
    
    row = new_tbody.insertRow(-1);
    addCell(row, "第" + (i+1) + "年");
    addCell(row, current_hoff.toPrecision(8));
    addCell(row, Math.round(current_year_sum));
    addCell(row, Math.round(sum));
    
    formula_string += "(" + annual + "/(1+" + i + "*" + r + "))";  
    if (i + 1 < years) {
      formula_string += "+";
    }
  }

  if (days != 0) {
    current_year_sum = (1 + (years + days / 365) * r);
    sum += current_year_sum;
    current_hoff = current_year_sum / annual;
    formula_string += "+(" + annual + "/(1+(" + years + "+" + days + "/365)*" + r + ")";
    row = new_tbody.insertRow(-1);
    addCell(row, "剩餘" + days + "天");
    addCell(row, current_hoff.toPrecision(8));
    addCell(row, Math.round(current_year_sum));
    addCell(row, Math.round(sum));
  }
  result.innerHTML = Math.round(sum);
  formula.innerHTML = formula_string;
  old_tbody.parentNode.replaceChild(new_tbody, old_tbody);
}
</script>
<?php get_footer(); ?>

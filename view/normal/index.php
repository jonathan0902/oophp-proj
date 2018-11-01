		<!-- /slider -->
				<div class="callbacks_container">
							<div class="banner-top">
								<div class="banner-info-wthree">
									<h3>Nike</h3>
									<p>Running in a new experiance.</p>

								</div>

							</div>
				</div>
				<div class="clearfix"> </div>
			<ul class="top_icons">
				<li><a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>

			</ul>
		</div>
	</div>
</div>
</div>
<div class="grid-block">
    <div class="divde-block">
      <p class="head">Newest Bloggs</p>
    </div>
    <?php
    $j = -1;
    for ($i=0; $i < count($query); $i++) {
        $j++;
        if ($j == 0) {
            echo '<div class="row blogg-row">';
        }
        echo $query[$i];
        if ($j == 2) {
            echo "</div>";
            $j = -1;
        }
    }
    ?>
</div>

<div class="grid-block">
    <div class="divde-block">
      <p class="head">Featured Blogg</p>
    </div>
    <?php
    $j = -1;
    for ($i=0; $i < count($blogg2); $i++) {
        $j++;
        if ($j == 0) {
            echo '<div class="row blogg-row">';
            echo "<div class='col-md-4'></div>";
        }
        echo $blogg2[$i];
        if ($j == 2) {
            echo "</div>";
            $j = -1;
        }
    }
    ?>

</div>
<div class="grid-block">
    <div class="divde-block">
      <p class="head">Newest Products</p>
    </div>
    <?php
    $j = -1;
    for ($i=0; $i < count($shop); $i++) {
        $j++;
        if ($j == 0) {
            echo '<div class="row blogg-row">';
        }
        echo $shop[$i];
        if ($j == 2) {
            echo "</div>";
            $j = -1;
        }
    }
    ?>
</div>

<div class="grid-block">
    <div class="divde-block">
      <p class="head">Recomended Product</p>
    </div>
    <?php
    $j = -1;
    for ($i=0; $i < count($shop2); $i++) {
        $j++;
        if ($j == 0) {
            echo '<div class="row blogg-row">';
            echo "<div class='col-md-4'></div>";
        }
        echo $shop2[$i];
        if ($j == 2) {
            echo "</div>";
            $j = -1;
        }
    }
    ?>
</div>

<div class="grid-block">
    <div class="divde-block">
      <p class="head">This Week Deals</p>
    </div>
    <?php
    $j = -1;
    for ($i=0; $i < count($shop3); $i++) {
        $j++;
        if ($j == 0) {
            echo '<div class="row blogg-row">';
        }
        echo $shop3[$i];
        if ($j == 2) {
            echo "</div>";
            $j = -1;
        }
    }
    ?>
</div>
</div>
</div>
<div class="clearfix"> </div>
</div>

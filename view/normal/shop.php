    <div class="callbacks_container">
    		<div class="banner-top-hidesite"></div>
    </div>
  </div>
</div>
<div class="clearfix"> </div>

<div class="grid-block">
    <div class="divde-block">
      <h3 class="head">Shop</h3>
      <p class="head">Skriv något extra</p>
    </div>
    <div class="shop-block">
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
</div>

    </div>
</div>

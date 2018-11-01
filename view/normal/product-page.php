<div class="callbacks_container">
    <div class="banner-top-hidesite"></div>
</div>
</div>
</div>
<div class="clearfix"> </div>

<main class="tiger">

  <!-- Left Column / Headphones Image -->
  <div class="left-column">
    <img data-image="red" class="active" src="images/<?= $query['picture'] ?>" alt="">
  </div>


  <!-- Right Column -->
  <div class="right-column">

    <!-- Product Description -->
    <div class="product-description">
      <span>Shoes</span>
      <h1><?= $query['name'] ?></h1>
    </div>

    <!-- Product Configuration -->
    <div class="product-configuration">

      <!-- Product Color -->
      <div class="product-color">
        <span>Color</span>

        <div class="color-choose">
          <div>
            <input data-image="red" type="radio" id="red" name="color" value="red" checked>
            <label for="red"><span></span></label>
          </div>
          <div>
            <input data-image="blue" type="radio" id="blue" name="color" value="blue">
            <label for="blue"><span></span></label>
          </div>
          <div>
            <input data-image="black" type="radio" id="black" name="color" value="black">
            <label for="black"><span></span></label>
          </div>
        </div>

      </div>

      <!-- Cable Configuration -->
      <div class="cable-config">
        <span>Sizes</span>

        <div class="cable-choose">
          <button>38</button>
          <button>39</button>
          <button>40</button>
        </div>

        <a href="#">How do i know my shoe size?</a>
      </div>
    </div>

    <!-- Product Pricing -->
    <div class="product-price">
      <span><?= $query['price'] ?> kr</span>
      <a href="#" class="cart-btn">Add to cart</a>
    </div>
  </div>
</main>

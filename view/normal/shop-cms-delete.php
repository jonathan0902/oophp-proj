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
<form class="form-class" action="shop-cms" method="post">
    <div class="form-group">
      <label for="">ID</label>
      <input type="number" name="data" class="form-control" id="" value="<?= $query['id'] ?>" placeholder="" readonly="readonly">
    </div>
    <div class="form-group">
      <label for="">Name</label>
      <input type="text" name="name" class="form-control" id="" value="<?= $query['name'] ?>" placeholder="" readonly="readonly">
    </div>
    <div class="form-group">
      <label for="">Price</label>
      <input type="number" name="price" class="form-control" id="" value="<?= $query['price'] ?>" placeholder="" readonly="readonly">
    </div>
    <div class="form-group">
      <label for="">Brand</label>
      <input type="text" name="brand" class="form-control" id="" value="<?= $query['brand'] ?>" placeholder="" readonly="readonly">
    </div>
    <div class="form-group">
      <label for="">Discount</label>
      <input type="number" name="discount" class="form-control" id="" value="<?= $query['discount'] ?>" placeholder="" readonly="readonly">
    </div>
    <div class="form-group">
      <label for="">Picture</label>
      <input type="text" name="picture" class="form-control" id="" value="<?= $query['picture'] ?>" placeholder="" readonly="readonly">
    </div>

    <div class="form-group">
      <input type="submit" name="delete-product" class="btn btn-md btn-danger" value="Delete" placeholder="">

    </div>
</form>

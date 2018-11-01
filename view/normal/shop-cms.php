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
<button class="btn btn-warning"><a href="shop-cms-add"><p class="white">Add another product<p></a></button>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>BRAND</th>
            <th>DISCOUNT</th>
            <th>PICTURE</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($query as $row) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['price'] ?> kr</td>
            <td><?= $row['brand'] ?></td>
            <td><?= $row['discount'] ?></td>
            <td><?= $row['picture'] ?></td>
            <td><a href="shop-cms-edit?edit=<?= $row['id'] ?>"><button class=""><span class="fa fa-edit"></span></button></a></td>
            <td><a href="shop-cms-delete?delete=<?= $row['id'] ?>"><button class=""><span class="fa fa-trash"></span></button></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

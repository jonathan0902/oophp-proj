<div class="callbacks_container">
        <div class="banner-top-hidesite"></div>
</div>
</div>
</div>
<div class="clearfix"> </div>
<div class="grid-block">
    <div class="divde-block">
      <h3 class="head">Blogg</h3>
      <p class="head">Skriv något extra</p>
    </div>
<form class="form-class" action="blogg-cms" method="post">
    <div class="form-group">
      <label for="">ID</label>
      <input type="number" name="data" class="form-control" id="" value="<?= $query['id'] ?>" placeholder="" readonly="readonly">
    </div>
    <div class="form-group">
      <label for="">Title</label>
      <input type="text" name="title" class="form-control" id="" value="<?= $query['title']?>" placeholder="" readonly="readonly">
    </div>
    <div class="form-group">
      <label for="">Sub Title</label>
      <input type="text" name="subtitle" class="form-control" id="" value="<?= $query['subtitle']?>" placeholder="" readonly="readonly">
    </div>
    <div class="form-group">
      <label for="">Text</label>
      <textarea class="form-control" name="Alltext" rows="8" cols="80" readonly="readonly"><?= $query['Alltext']?></textarea>
    </div>
    <div class="form-group">
      <label for="">Date</label>
      <input type="date" name="datum" class="form-control" id="" value="<?= $query['datum']?>" placeholder="" readonly="readonly">
    </div>
    <div class="form-group">
      <label for="">Picture</label>
      <input type="text" name="picture" class="form-control" id="" value="<?= $query['picture']?>" placeholder="" readonly="readonly">
    </div>

    <div class="form-group">
      <input type="submit" name="delete-blogg" class="btn btn-md btn-danger" placeholder="" value="Delete">

    </div>
</form>

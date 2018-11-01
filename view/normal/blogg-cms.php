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
<button class="btn btn-warning"><a href="blogg-cms-add"><p class="white">Add another blogg<p></a></button>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>SUBTITLE</th>
            <th>ALLTEXT</th>
            <th>DATE</th>
            <th>PICTURE</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($query as $row) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['title'] ?></td>
            <td><?= $row['subtitle'] ?> </td>
            <td><?= substr($row['Alltext'], 0, 110) . "..." ?></td>
            <td><?= $row['datum'] ?></td>
            <td><?= $row['picture'] ?></td>
            <td><a href="blogg-cms-edit?edit=<?= $row['id'] ?>"><button class=""><span class="fa fa-edit"></span></button></a></td>
            <td><a href="blogg-cms-delete?delete=<?= $row['id'] ?>"><button class=""><span class="fa fa-trash"></span></button></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

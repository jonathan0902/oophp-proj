<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Showing message Hello World, not using the standard page layout.
 */

include(__DIR__ . '/../htdocs/gissa/autoload_namespace.php');

$app->router->any(["GET", "POST"], "", function () use ($app) {
    $title = "Home";

    $connect = new \Jonathan\Sql\Database();
    $connect->connectDB();

    $connect2 = new \Jonathan\Sql\Crud();
    $connect2->connectDB();

    if (isset($_POST['submit'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $query = $connect->queryUsername("SELECT username FROM users WHERE username = '$user' AND password = '$pass'");

        $app->session->set("login", $query);
    }

    $query = $connect->queryBlogg("SELECT * FROM blogg LIMIT 3");
    $shop = $connect2->queryShop("SELECT * FROM eshop LIMIT 3");
    $shop2 = $connect2->queryShop("SELECT * FROM eshop ORDER BY RAND() LIMIT 1");
    $blogg2 = $connect->queryBlogg("SELECT * FROM blogg ORDER BY RAND() LIMIT 1");
    $shop3 = $connect2->queryShop("SELECT * FROM eshop ORDER BY RAND() LIMIT 3");

    $app->page->add("normal/index", [
        "query" => $query,
        "shop" => $shop,
        "shop2" => $shop2,
        "blogg2" => $blogg2,
        "shop3" => $shop3
    ]);
    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "about", function () use ($app) {
    $title = "About";
    $app->page->add("normal/about", [

    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "shop", function () use ($app) {
    $title = "EShop";
    $connect = new \Jonathan\Sql\Database();

    $connect->connectDB();

    $query = $connect->queryShop("SELECT * FROM eshop");

    $app->page->add("normal/shop", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "blogg", function () use ($app) {
    $title = "Blogg";
    $connect = new \Jonathan\Sql\Database();

    $connect->connectDB();

    $query = $connect->queryBlogg("SELECT * FROM blogg");

    $app->page->add("normal/blogg", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});


$app->router->any(["GET", "POST"], "product", function () use ($app) {
    $title = "Eshop";

    $id = $_GET['pr'];
    $connect = new \Jonathan\Sql\Database();

    $connect->connectDB();

    $query = $connect->queryBloggPage("SELECT * FROM eshop WHERE id = '$id'");

    $app->page->add("normal/product-page", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "blogg-page", function () use ($app) {
    $title = "Blogg";

    $id = $_GET['blogg'];
    $connect = new \Jonathan\Sql\Database();

    $connect->connectDB();

    $query = $connect->queryBloggPage("SELECT * FROM blogg WHERE id = '$id'");

    $app->page->add("normal/blog-page", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "login", function () use ($app) {
    $title = "Login";
    $app->page->add("normal/login", [

    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "blogg-cms", function () use ($app) {
    $title = "Blogg-cms";

    $connect = new \Jonathan\Sql\Database();
    $connect2 = new \Jonathan\Sql\Crud();

    $connect2->connectDB();

    $connect->connectDB();

    if (isset($_POST['add-blogg'])) {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $alltext = $_POST['Alltext'];
        $datum = $_POST['datum'];
        $picture = $_POST['picture'];

        $sql = "INSERT INTO blogg (title, subtitle, alltext, datum, picture) VALUES ('$title', '$subtitle', '$alltext', '$datum', '$picture')";

        $connect2->insertData($sql);
    }

    if (isset($_POST['edit-blogg'])) {
        $id = $_POST['data'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $alltext = $_POST['Alltext'];
        $datum = $_POST['datum'];
        $picture = $_POST['picture'];

        $sql = "UPDATE blogg SET title = '$title', subtitle = '$subtitle', Alltext = '$alltext', datum = '$datum', picture = '$picture' WHERE id = $id";

        $connect2->insertData($sql);
    }

    if (isset($_POST['delete-blogg'])) {
        $id = $_POST['data'];

        $sql = "DELETE FROM blogg WHERE id = $id";

        $connect2->insertData($sql);
    }

    $query = $connect->queryTable("SELECT * FROM blogg");

    $app->page->add("normal/blogg-cms", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});


$app->router->any(["GET", "POST"], "shop-cms", function () use ($app) {
    $title = "Shop-cms";

    $connect = new \Jonathan\Sql\Database();
    $connect2 = new \Jonathan\Sql\Crud();

    $connect2->connectDB();

    if (isset($_POST['add-product'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $discount = $_POST['discount'];
        $picture = $_POST['picture'];

        $sql = "INSERT INTO eshop (name, price, brand, discount, picture) VALUES ('$name', $price, '$brand', $discount, '$picture')";

        $connect2->insertData($sql);
    }

    if (isset($_POST['edit-product'])) {
        $id = $_POST['data'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $brand = $_POST['brand'];
        $discount = $_POST['discount'];
        $picture = $_POST['picture'];

        $sql = "UPDATE eshop SET name = '$name', price = $price, brand = '$brand', discount = $discount, picture = '$picture' WHERE id = $id";

        $connect2->insertData($sql);
    }

    if (isset($_POST['delete-product'])) {
        $id = $_POST['data'];

        $sql = "DELETE FROM eshop WHERE id = $id";

        $connect2->insertData($sql);
    }

    $connect->connectDB();

    $query = $connect->queryTable("SELECT * FROM eshop");

    $app->page->add("normal/shop-cms", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "shop-cms-add", function () use ($app) {
    $title = "Shop-cms-add";

    $app->page->add("normal/shop-cms-add", [
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "shop-cms-edit", function () use ($app) {
    $title = "Shop-cms-edit";

    $id = $_GET['edit'];

    $connect2 = new \Jonathan\Sql\Crud();

    $connect2->connectDB();

    $query = $connect2->queryEdit("SELECT * FROM eshop WHERE id = '$id'");

    $app->page->add("normal/shop-cms-edit", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "shop-cms-delete", function () use ($app) {
    $title = "Shop-cms-delete";

    $id = $_GET['delete'];

    $connect2 = new \Jonathan\Sql\Crud();

    $connect2->connectDB();

    $query = $connect2->queryEdit("SELECT * FROM eshop WHERE id = '$id'");

    $app->page->add("normal/shop-cms-delete", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "blogg-cms-add", function () use ($app) {
    $title = "Blogg-cms-add";

    $app->page->add("normal/blogg-cms-add", [
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "blogg-cms-edit", function () use ($app) {
    $title = "Blogg-cms-edit";

    $id = $_GET['edit'];

    $connect2 = new \Jonathan\Sql\Crud();

    $connect2->connectDB();

    $query = $connect2->queryEdit("SELECT * FROM blogg WHERE id = '$id'");

    $app->page->add("normal/blogg-cms-edit", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "blogg-cms-delete", function () use ($app) {
    $title = "Blogg-cms-delete";

    $id = $_GET['delete'];

    $connect2 = new \Jonathan\Sql\Crud();

    $connect2->connectDB();

    $query = $connect2->queryEdit("SELECT * FROM blogg WHERE id = '$id'");

    $app->page->add("normal/blogg-cms-delete", [
        "query" => $query
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "logout", function () use ($app) {
    $title = "Logout";

    $app->session->destroy("login");

    header('Location: index.php');
    die();
    $app->page->add("normal/index", [
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

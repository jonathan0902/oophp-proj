<?php
namespace Jonathan\Sql;

/**
 *
 */
class Crud
{

    /**
     * String $servername is the name of the server.
     * String $username is the name of the username of the server.
     * String $password is the password for the server.
     * String $dbname is the database name.
     * Array $connection is the database connection
     */
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $connection;

    public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "cslim")
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connectDB()
    {
        $this->connection = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return true;
    }

    public function insertData($sql)
    {
        $this->connection->query($sql);
        return true;
    }

    public function queryEdit($sql)
    {
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                return $row;
            }
        } else {
            return false;
        }
    }

    public function queryShop($sql)
    {
        $result = $this->connection->query($sql);
        $i = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['discount'] != null) {
                    $discount = <<<EOT
                    <div class="shop-discount-circle">
                      <p class="discount-shop">-$row[discount]%</p>
                    </div>
EOT;
                } else {
                    $discount = "";
                }
                $baz[$i] = <<<EOT
                    <div class="col-md-4 text-center" style="position: relative;">
                      <a href="product?pr=$row[id]">
                      <div class="center-cropped">
                        <img src="images/$row[picture]"/>
                      </div>
                      $discount
                      <div class="shop-title-row">
                        <h3 class="">$row[name]</h3>
                        <h4 class="">$row[price] kr</h4>
                      </div>
                      <p class="blogg-semi-title-row">$row[brand]</p>
                    </a>
                    </div>
EOT;
                $i++;
            }
            return $baz;
        } else {
            return false;
        }
    }
}

<?php
namespace Jonathan\Sql;

/**
 *
 */
class Database
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

    /**
     * __construct.
     */
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

    public function queryUsername($sql)
    {
        $result = $this->connection->query($sql);

        if ($result->num_rows > 0) {
            while ($result->fetch_assoc()) {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * This will suppress all the PMD warnings in
     * this class.
     *
     * @SuppressWarnings(PHPMD)
     */
    public function queryBlogg($sql)
    {
        $result = $this->connection->query($sql);
        $i = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $month = substr($row['datum'], 5, 2);
                $dateObj   = \DateTime::createFromFormat('!m', $month);
                $monthName = substr($dateObj->format('F'), 0, 3);
                $day = substr($row['datum'], -2);
                $text = substr($row['Alltext'], 0, 110) . "...";
                $baz[$i] = <<<EOT
                      <div class="col-md-4 text-center" style="position: relative;">
                        <a href="blogg-page?blogg=$row[id]">
                        <img src="images/$row[picture]"/>
                        <div class="blogg-date-circle">
                          <p class="month-blogg">$monthName</p>
                          <p class="day-blogg">$day</p>
                        </div>
                        <h3 class="blogg-title-row">$row[title]</h3>
                        <p class="blogg-semi-title-row">$row[subtitle]</p>
                        <p class="blogg-show-text-row">$text</p>
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

    public function queryBloggPage($sql)
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
                    <div class="col-md-3 text-center" style="position: relative;">
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

    public function queryTable($sql)
    {
        $result = $this->connection->query($sql);
        $data = [];
        $i = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                 $data[$i] = $row;
                 $i++;
            }
            return $data;
        } else {
            return false;
        }
    }
}

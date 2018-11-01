<?php

namespace Jonathan\Sql;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Guess.
 */
class CrudTest extends TestCase
{
    public function testIfConnectionWorks()
    {
        $connect = new \Jonathan\Sql\Crud();

        $res = $connect->connectDB();
        $this->assertTrue($res);
    }

    public function testIfInsertData()
    {
        $connect = new \Jonathan\Sql\Crud("localhost", "root", "", "cslim");

        $connect->connectDB();
        $res = $connect->insertData("INSERT INTO testdata (title) VALUES ('Test')");
        $this->assertTrue($res);
    }

    public function testIfSelectData()
    {
        $connect = new \Jonathan\Sql\Crud("localhost", "root", "", "cslim");

        $connect->connectDB();
        $res = $connect->queryEdit("SELECT * FROM testdata");
        $this->assertSame($res['title'], 'Test');
    }

    public function testIfSelectDataFalse()
    {
        $connect = new \Jonathan\Sql\Crud("localhost", "root", "", "cslim");

        $connect->connectDB();
        $res = $connect->queryEdit("SELECT * FROM testdata WHERE id = 0");
        $this->assertFalse($res);
    }

    public function testIfSelectDataShopTrue()
    {
        $connect = new \Jonathan\Sql\Crud("localhost", "root", "", "cslim");

        $connect->connectDB();
        $res = $connect->queryShop("SELECT * FROM eshop LIMIT 1");
        $this->assertCount(1, $res);
    }

    public function testIfSelectDataShopFalse()
    {
        $connect = new \Jonathan\Sql\Crud("localhost", "root", "", "cslim");

        $connect->connectDB();
        $res = $connect->queryShop("SELECT * FROM eshop WHERE id = 0");
        $this->assertFalse($res);
    }
}

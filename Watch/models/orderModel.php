<?php

class orderModel
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'store';

    private $con = null;
    private $result = null;

    public function connect()
    {
        $this->con =  mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
        if ($this->con)
         {
             mysqli_set_charset($this->con, 'utf8');
            
         }
        return $this->con;
    }

    public function execute($sql)
    {
        $this->result = $this->con->query($sql);
        return $this->result;
    }

    public function getDataById($id)
    {
        $sql = "SELECT * FROM orders WHERE order_id = '$id' ";
        $this->execute($sql);
        if ($this->num_rows() != 0)
            $data = mysqli_fetch_array($this->result);
        else 
            $data = 0;
        return $data;
    }

    public function getData()
    {
        if ($this->result)
            $data = mysqli_fetch_array($this->result);
        else 
            $data = 0;
        return $data;
    }
    public function getAllData($table)
    {
        $sql = "SELECT * FROM $table  ORDER BY status DESC";
        $this->execute($sql);
        if ($this->num_rows() === 0)
            $data=0;
        else 
            while ($datas = $this->getData())
                $data[] = $datas;
        return $data;
    }

    public function num_rows()
    {
        if ($this->result)
            $num = mysqli_num_rows($this->result);
        else $num = 0;
        return $num;    
    }


    public  function getDetailByID($order_id)
    {
        $sql = " SELECT c.cart_id,c.product_id, c.quantity, c.color, c.size, c.totalPrice,p.price, p.name FROM carts c 
                    left join products p on p.product_id = c.product_id
                    WHERE order_id = '$order_id' 
                    order by c.product_id asc";
        return mysqli_fetch_all(mysqli_query( mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname),$sql),MYSQLI_ASSOC);
    }


    public function updateStatus($order_id, $status)
    {
        $sql = "   UPDATE orders
                    SET status = '$status'
                    WHERE order_id = '$order_id'  ";
        return $this->execute($sql);
    }

    public function save($order_id,$name,$phone,$address,$method,$created_at)
    {
        $sql = "UPDATE orders
                SET  name = '$name', address = '$address', phone = '$phone', method = '$method',status = 'unprocessed', created_at = '$created_at'
                WHERE order_id = '$order_id'";
        return $this->execute($sql);
    }

    public function filterTable($valueToSearch)
    {
        $query = "SELECT * FROM `orders` 
                    WHERE CONCAT(`order_id`, `user_id`, `name`,`total`,`phone`, `address`, `method`, `status`,`total`) 
                    LIKE '%".$valueToSearch."%'";
        $this->execute($query);
        if ($this->num_rows() === 0)
            $data=0;
        else
            while ($datas = $this->getData())
                $data[] = $datas;
        return $data;
    }
    public function createOrder($user_id,$name,$phone,$address,$method,$total,$created_at)
    {
        $sql = "INSERT INTO orders(user_id,name,phone,address,method,total,created_at,status) 
                VALUES ('$user_id','$name','$phone', '$address', '$method', '$total','$created_at','unprocessed') ";
        return $this->execute($sql);
    }

    public function getOrderId($user_id,$created_at)
    {
        $sql="SELECT * From orders where user_id = '$user_id' and created_at = '$created_at' ";
         $this->execute($sql);
        if ($this->num_rows() != 0)
            $data = mysqli_fetch_array($this->result);
        else
            $data = 0;
        return $data;
    }

    public function myOrder($user_id)
    {
        $sql = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY status DESC";
        $this->execute($sql);
        if ($this->num_rows() === 0)
            $data=0;
        else
            while ($datas = $this->getData())
                $data[] = $datas;
        return $data;
    }
}
?>

<?php

class cartModel
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

    public function getData()
    {
        if ($this->result)
            $data = mysqli_fetch_array($this->result);
        else
            $data = 0;
        return $data;
    }

    public function num_rows()
    {
        if ($this->result)
            $num = mysqli_num_rows($this->result);
        else $num = 0;
        return $num;
    }

    public function saveToCart($user_id,$product_id,$color,$size,$quantity,$price)
    {
        $sql = "INSERT INTO carts(user_id,product_id, size , color , quantity ,totalPrice ,status) 
                VALUES ('$user_id','$product_id','$size' ,'$color','$quantity','$price' ,'Added to Cart' )";
        return mysqli_query( mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname),$sql);
    }
    public function getDataByUser($user_id)
    {
        $sql = " SELECT c.cart_id,c.product_id, c.quantity, c.color, c.size, c.totalPrice,p.price, p.name FROM carts c 
                    left join products p on p.product_id = c.product_id
                    WHERE user_id = '$user_id' and status = 'Added to Cart'
                    order by c.product_id asc";
        $this->execute($sql);
        if ($this->num_rows() === 0)
            $data=0;
        else
            while ($datas = $this->getData())
                $data[] = $datas;
        return $data;

    }

    public function confirm($order_id,$user_id)
    {
        $sql1 = " UPDATE carts
                    SET order_id = '$order_id', status = 'Confirmed'
                   WHERE user_id = '$user_id'  and status = 'Added to Cart'  ";
       return $this->execute($sql1);
    }

    public function update($cart_id,$quantity,$newPrice)
    {
        $sql = "UPDATE carts
                    SET quantity = '$quantity',totalPrice = '$newPrice'
                    WHERE cart_id = '$cart_id' and status = 'Added to Cart'";
        return mysqli_query( mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname),$sql);
    }

    public function delete($cart_id)
    {
        $sql = "DELETE FROM carts
                WHERE cart_id = '$cart_id'";
        return mysqli_query( mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname),$sql);
    }
}

?>

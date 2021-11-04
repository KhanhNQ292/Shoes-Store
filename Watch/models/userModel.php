<?php


	class userModel
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

        public function getAllData($table)
        {
            $sql = "SELECT * FROM $table ORDER BY role ASC";
            $this->execute($sql);
            if ($this->num_rows() === 0)
                $data = 0;
            else
                while ($datas = $this->getData())
                    $data[] = $datas;
            return $data;
        }
		public function getDataById($user_id)
{
	$sql = "SELECT * FROM users WHERE user_id = '$user_id'";
	$this->execute($sql);
	if ($this->num_rows() != 0)
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
	
	
   
	
	public function register( $name,$email, $password, $contact, $address, $role)
	{	
	
   $sql = "INSERT INTO `users`(name, email,password, contact, address, role) VALUES ('$name', '$email','$password', '$contact', '$address','user')";
   return $this->execute($sql);

}   

public function checkEmail($email){
		$sql = "select * from users where email = '$email'";
		$this->execute($sql);
		if($this->num_rows()===0){
			return false;
		}else{
			return true;
		}
	}
	public function login($email, $password)
    {
        $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
        return mysqli_num_rows($this->execute($sql));
    }   


    public function updateData($name, $email, $password, $contact, $address,$user_id)
    {
        $sql = "   UPDATE users
                        SET  name = '$name', email  = '$email', password = '$password', contact = '$contact', address = '$address'
                            WHERE user_id = '$user_id'  ";

        return $this->execute($sql);
    }

public function getDataByEmail($email)
{
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$this->execute($sql);
	if ($this->num_rows() != 0)
		$data = mysqli_fetch_array($this->result);
	else
		$data = 0;
	return $data;
}

        public function changeRole($id,$role)
        {
            $sql = "   UPDATE users
                        SET role = '$role'
                            WHERE user_id = '$id'  ";
            return $this->execute($sql);
        }

        public function delete($id)
        {
            $sql = " DELETE FROM users
                     WHERE user_id = '$id' ";
            return $this->execute($sql);
        }

        public function filterTable($valueToSearch)
        {
            $query = "SELECT * FROM `users` WHERE CONCAT(`user_id`, `name`, `contact`,`address`,`role`) LIKE '%".$valueToSearch."%' order by role asc";
            $this->execute($query);
            if ($this->num_rows() === 0)
                $data = 0;
            else
                while ($datas = $this->getData())
                    $data[] = $datas;
            return $data;
        }
	}
	
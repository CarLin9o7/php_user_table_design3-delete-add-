<?php
class User{
    private $connect;
    public function __construct($connect){
        $this->connect = $connect;
    }

    public function getAllUsers(){
    $sql = "select * from user_table order by user_id desc";
    $stmt = $this->connect->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
    }
    public function addUser($first_name, $last_name, $email, $gender, $user_address){
    $sql = "insert into user_table(first_name, last_name, email, gender, user_address) values (?, ?, ?, ?, ?)";
    $stmt = $this->connect->prepare($sql);
    $result = $stmt->execute([$first_name, $last_name, $email, $gender, $user_address]);
    return $result;
    }
    public function deleteUser($user_id){
        $sql = "delete from user_table where user_id = :user_id";
        $stmt = $this->connect->prepare($sql);
        return $stmt->execute(['user_id' => $user_id]);
    }
}
?>
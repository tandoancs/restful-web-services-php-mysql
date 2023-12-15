<?php
class User
{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $fullname;
    public $username;
    public $password;
    public $email;
    public $phone_number;
    public $gender;
    public $created;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // signup user
    function signup()
    {

        if ($this->isAlreadyExist()) {
            return false;
        }

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                fullname=:fullname, username=:username, password=:password, email=:email, phone_number=:phone_number, gender=:gender, created=:created";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->created = htmlspecialchars(strip_tags($this->created));

        // bind values
        $stmt->bindParam(":fullname", $this->fullname);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone_number", $this->phone_number);
        $stmt->bindParam(":gender", $this->gender);
        $stmt->bindParam(":created", $this->created);

        // execute query
        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }

        return false;
    }

    // login user
    function login()
    {
        // select all query
        $query = "SELECT
                    `id`, `fullname`, `username`, `password`, `email`, `phone_number`, `gender`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='" . $this->username . "' AND password='" . $this->password . "'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;
    }

    // a function to check if username already exists
    function isAlreadyExist()
    {

        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='" . $this->username . "'";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

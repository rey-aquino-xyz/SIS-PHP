
<?php class DBHelper
{
    static function GetConnectionString()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';

        return new PDO(
            "mysql:host=$servername;dbname=sisdb",
            $username,
            $password
        );
    }
    private static function CreateStudentTable()
    {
        $studentTbl = "CREATE TABLE IF NOT EXISTS student
                    (
                    Id int NOT NULL AUTO_INCREMENT,
                    Firstname varchar(50),
                    Lastname varchar(50),
                    Middlename varchar(50),
                    Course varchar(50),
                    Year varchar(50),
                     Section varchar(50),
                    PRIMARY KEY (ID)
                    )";
        try {
            $DBConnection = DBHelper::GetConnectionString();
            $DBConnection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $DBConnection->exec($studentTbl);
        } catch (PDOException $e) {
            echo 'Command failed: ' . $e->getMessage();
        }
        $DBConnection = null;
    }
    private static function CreateUserTable()
    {
        $qUserTbl = "CREATE TABLE IF NOT EXISTS user
                    (
                    Id int NOT NULL AUTO_INCREMENT,
                    Username varchar(50),
                    Password varchar(50),
                    PRIMARY KEY (ID)
                    )";
        try {
            $DBConnection = DBHelper::GetConnectionString();
            $DBConnection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $DBConnection->exec($qUserTbl);
        } catch (PDOException $e) {
            echo 'Command failed: ' . $e->getMessage();
        }
        $DBConnection = null;
    }
    public static function CreateDatabase()
    {
        $dbName = 'sisdb';
        $qDB = "Create Database IF NOT EXISTS $dbName";
        try {
            $DBConnection = new PDO('mysql:host=localhost', 'root', '');
            $DBConnection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $DBConnection->exec($qDB);
            $DBConnection->exec("use $dbName");
            DBHelper::CreateUserTable();
            DBHelper::CreateStudentTable();
        } catch (PDOException $e) {
            echo 'Command failed: ' . $e->getMessage();
        }
        $DBConnection = null;
    }
    public static function ExecuteCommandWithParam($query, array $param)
    {
        try {
            $DBConnection = DBHelper::GetConnectionString();
            $DBConnection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $BindParam = $DBConnection->prepare($query);
            $BindParam->execute($param);
        } catch (PDOException $e) {
            echo 'Command failed: ' . $e->getMessage();
        }
        $DBConnection = null;
    }

    public static function GetDataWithParam($query, array $param)
    {
        try {
            $DBConnection = DBHelper::GetConnectionString();
            $DBConnection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $getData = $DBConnection->prepare($query);
            $getData->execute($param);
            $data = $getData->fetchAll();
            return $data;
        } catch (PDOException $e) {
            echo 'Command failed: ' . $e->getMessage();
        }
        $DBConnection = null;
    }
    public static function GetData($query)
    {
        try {
            $DBConnection = DBHelper::GetConnectionString();
            $DBConnection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
            $getData = $DBConnection->prepare($query);
            $getData->execute();
            $data = $getData->fetchAll();
            return $data;
        } catch (PDOException $e) {
            echo 'Command failed: ' . $e->getMessage();
        }
        $DBConnection = null;
    }
}

?>

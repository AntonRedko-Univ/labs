<html>
<head>
    <title>Авторизация пользователя</title>
</head>
<body>
<?php
$log = $_POST["login"];
$pass = $_POST["password"];

$usinfo = array(array('login' => 'BarATrum009', 'password' => 'cominthrough', 'name' => 'Ада', 'surname' => 'Байрон', 'role' => 'admin'),
                array('login' => 'Dotyev007', 'password' => 'H@5ley', 'name' => 'Афанасий', 'surname' => 'Авдотьев', 'role' => 'client'),
                array('login' => 'imabest', 'password' => 'bestmanager', 'name' => 'Иван', 'surname' => 'Иванов', 'role' => 'manager'));

if (!($log == $usinfo[0]['login']) || !($log == $usinfo[1]['login']) || !($log == $usinfo[2]['login'])){
    header('location: login.php');
}

class user {
    public $login;
    public $password;
    public $name;
    public $surname;
    public $role;

    function __construct($login,$password,$name,$surname,$role)
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
    }
}
class admin extends user {

    public function introduce (){
        echo "Здравствуйте, " . $this->name. "  " . $this->surname. "  ". ", поскольку Вы админ, Вы можете всё на этом сайте";
    }
}
class manager extends user {

    public function introduce() {
        echo "Здравствуйте, " . $this->name. "  " . $this->surname. "  ". ", вам разрешено редактировать и удалять пользователей с аккаунтами статус у которых - клиент";
    }
}
class client extends user {

    public function introduce (){
        echo "Здравствуйте, " . $this->name. "  " . $this->surname. "  ". ", добро пожаловать!";;
    }
}

switch ($log) {
    case "BarATrum009";
        $admin = new admin($usinfo[0]["name"], $usinfo[0]["surname"], $usinfo[0]["role"], $usinfo[0]["login"], $usinfo[0]["password"]);
        $admin->introduce();
        break;
    case "imabest";
        $manager = new manager($usinfo[2]["name"], $usinfo[2]["surname"], $usinfo[2]["role"], $usinfo[2]["login"], $usinfo[2]["password"]);
        $manager->introduce();
        break;
    case "Dotyev007";
        $client = new client($usinfo[1]["name"], $usinfo[1]["surname"], $usinfo[1]["role"], $usinfo[1]["login"], $usinfo[1]["password"]);
        $client->introduce();
        break;
}
?>
</html>

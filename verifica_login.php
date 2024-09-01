    <?php
session_start();

require_once("conexao-bd.php");

if (!empty($_REQUEST)) {
    try {

        $email = $_REQUEST['email'];
        $password = hash('sha256', $_REQUEST['password']);
        //print("$email<br>");
        //("$password<br>");
        
        
        $stmt = $conn->prepare("SELECT count(*) FROM user WHERE email = ? AND password=?");
        $stmt->execute(([$email, $password]));
        $rs = $stmt->fetchall()[0];
        //print_r($rs);
        
        if ($rs['count(*)'] == 0){
            print("Erro no login");
            session_unset();
            session_destroy();
        } else {
            $_SESSION['email'] = $email;
            header("Location: menu.php");
            // mais
        }
    } catch (PDOException $e) {
        print("Error: " . $e->getCode());
        print("Error: " . $e->getMessage());
    }
}
else {
    print('$_REQUEST esta vazio');
}

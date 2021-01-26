
<html>
<head>
    <meta charset="UTF-8"/>
    <title>KULLANICI EKLEME EKRANI</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div id="kayit_formu">

    <form action="?" method="post">
        <table>
            <tr>
                <td>Kullanıcı Adı:</td>
                <td><input type="text" required="" placeholder="Kullanıcı Adınız..." name="kadi"></td>
            </tr>
            <tr>
                <td>Şifre:</td>
                <td><input type="password" required="" placeholder="Kullanıcı Şifreniz..." name="pass"></td>
            </tr>
            <tr>
                <td>Mail:</td>
                <td><input type="mail" required="" placeholder="Kullanıcı Mailiniz..." name="mail"></td>
            </tr>
            <tr>
                <td></td>
                <td><input id="button" type="submit" name="kayit" value="Kayıt Ol"></td>
            </tr>
            <tr>
                <td></td>
                <td><input id="button" type="submit" name="giris" value="Giriş Yap"></td>
            </tr>

        </table>
    </form>

<?php
    if($_POST) {
        $kadi = $_POST['kadi'];
        $sifre = $_POST['pass'];
        $mail = $_POST['mail'];

        if ($kadi == "" || $sifre == "" || $mail == "") {
            echo "Boş alan bırakmayınız!";
        } else {
            try {
                $baglan = new PDO("mysql:host=localhost;dbname=dogrulama", "user", "");
            } catch (PDOException $e) {
                print $e->getMessage();
            }

            $sorgu=$baglan->prepare("INSERT INTO uyeler SET kadi = ? , pass = ? , mail = ?");
            $ekle=$sorgu->execute(array($kadi,$sifre,$mail));
            if($ekle){
                $last_id = $baglan->lastInsertId();
                echo "Kayıt Olundu";
            }

        }
    }
?>

</div>
</body>
</html>
<ul>
    <li><a href="../staff_login/staff_top.php">トップページ</a><br /></li>
    <?php
        if(isset($_SESSION['member_login']) == false) {
            print '<li style="float:right;"><a href="member_login.php">会員ログイン</a></li>';
            print '<li style="float:right;">ようこそゲスト様</li>';
            
        } else {
            print '<li style="float:right;"><a href="member_logout.php">ログアウト</a></li>';
            print '<li style="float:right;">ようこそ '.$_SESSION['member_name'].'様</li>';   
        }
        
    ?>
</ul>
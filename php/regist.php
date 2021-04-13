
<?php
require "connect.php";      //导入mysql.php访问数据库
$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];
if(checkEmpty($email,$password,$password2)){
  if(checkEmail($email)){
    if(checkpwd($password,$password2)){
      $verify_code  = codestr();
      if(insert($email,$password)){
        echo"register successfully!";
        echo '<script>location.href="./index.html"</script>';//注册完成，跳转到登陆页面
      }
    }
  }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//调用PHPMailer组件，此处是你自己的目录，需要改写。
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);       // Passing `true` enables exceptions
try {
    //服务器配置
    $mail->CharSet ="UTF-8";                     //设定邮件编码
    $mail->SMTPDebug = 0;                        // 调试模式输出
    $mail->isSMTP();                             // 使用SMTP
    $mail->Host = '  smtp.qq.com';            // SMTP服务器
    $mail->SMTPAuth = true;                      // 允许 SMTP 认证
    $mail->Username = '**********';              // SMTP 用户名  即邮箱的用户名
    $mail->Password = '****************';        // SMTP 密码  部分邮箱是授权码(例如163邮箱)
    $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
    $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

    $mail->setFrom('*********qq.com', 'Mailer');  //发件人（以QQ邮箱为例）

    $mail->addAddress($Email, 'Joe');  // 收件人（$Email可以为变量传值，也可为固定值）
    //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
    $mail->addReplyTo('*********@qq.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
    //$mail->addCC('cc@example.com');                    //抄送
    //$mail->addBCC('bcc@example.com');                    //密送

    //发送附件
    // $mail->addAttachment('../xy.zip');         // 添加附件
    // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

    //$yanzhen = codestr();  //此处为调用随机验证码函数（按照自己实际函数名改写）

    //Content
    $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
    $mail->Subject = '******身份登录验证';
    $mail->Body    = '<h1>欢迎使用******</h1><h3>您的身份验证码是：<span>'.$yanzhen.'</span></h3>' . date('Y-m-d H:i:s');
    $mail->AltBody = '欢迎使用********,您的身份验证码是：'.$yanzhen . date('Y-m-d H:i:s');

    $mail->send();
    echo '验证邮件发送成功，请注意查收！';
} catch (Exception $e) {
    echo '邮件发送失败: ', $mail->ErrorInfo;
}

}


//生成6位随机验证码
function codestr(){
    $arr=array_merge(range('a','b'),range('A','B'),range('0','9'));
    shuffle($arr);
    $arr=array_flip($arr);
    $arr=array_rand($arr,6);
    $res='';
    foreach ($arr as $v){
        $res.=$v;
}
return $res;
}

//方法：判断是否为空
function checkEmpty($email,$password,$password2){
  if($email==null||$password==null||$password2==null){
    echo '<html><head><Script Language="JavaScript">alert("you have enter all info to regist");</Script></head></html>'.
     "<meta http-equiv=\"refresh\" content=\"0;url=regist.html\">";//redirect to register.html
  }
  else{
    return true;
  }
}

//方法：检查两次密码是否相同
function checkpwd($password,$password2){
  if($password==$password2)
    return true;
  else
    echo '<html><head><Script Language="JavaScript">alert("The two passwords don\'t match");</Script></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=regist.html\">";
}
//方法：邮箱格式验证
function checkEmail($email){
  $preg = '/^(\w{1,25})@(\w{1,16})(\.(\w{1,4})){1,3}$/';
  if(preg_match($preg, $email)){
    return true;
  }else{
    echo '<html><head><Script Language="JavaScript">alert("wrong email adress");
    </Script></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=regist.html\">";
  }
}
//方法：将数据插入数据库中
function insert($email,$password,$verify_code){
  $conn=new Mysql();
  $sql="insert into user VALUE (NUll,'$email',$password','$verify_code')";
  $result=$conn->sql($sql);
  if($result){
    return true;
  }
  else{
    echo '<html><head><Script Language="JavaScript">alert("Failed to connect to database, please try again");
    </Script></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=register.html\">";
  }
  $conn->close();
}
?>

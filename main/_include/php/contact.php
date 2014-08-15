 <?php
function sanitize($var)
{
 $var=strip_tags($var);
 $var=htmlentities($var);
 $var=stripslashes($var);
 return mysql_real_escape_string($var);
 
}
 

if(isset($_POST['username'])&&isset($_POST['reg-id'])&&isset($_POST['branch'])&&isset($_POST['email'])&&isset($_POST['phone_no'])&&isset($_POST['message'])&&isset($_POST['post']))
  { 
    if(!empty($_POST['username'])&&!empty($_POST['reg-id'])&&!empty($_POST['branch'])&&!empty($_POST['email'])&&!empty($_POST['phone_no'])&&!empty($_POST['message'])&&!empty($_POST['post']))
     {
	 $username=sanitize($_POST['username']);
	 $branch=sanitize($_POST['branch']);
	 $reg_id=sanitize($_POST['reg-id']);
	 $email=sanitize($_POST['email']);
	 $phone_no=sanitize($_POST['phone_no']);
	 $subject=sanitize($_POST['branch']);
	 $post=sanitize($_POST['message']);
	 send_mail_user();
	 send_mail_admin();
     }
	 else echo "Empty field seen";
	}
 else echo "Please enter all your details correctly";




function send_mail_admin()
{
						$to = "gusac.info@gmail.com";
						$subject="$subject"
						$message = "$username with $college and branch $branch posted \n $post";	
						$header = "From: $username";
						$mail_sent = mail($to, $subject, $message, $header);
}
function send_mail_user()
{
						$to = "$email";
						$message = "$username Thank you for visiting gusac.org. \n We will contact u as soon as possible  ";	
						$header = "From: Gusac Team";
						$mail_sent = mail($to, $subject, $message, $header);
}
?>


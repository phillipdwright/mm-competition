<?

    $bid = $_REQUEST['bid'];

    $query = $mysqli->prepare("SELECT id, name FROM m_events WHERE id = ? AND starttime <= NOW()");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($b_id, $b_bowlname);

    if ($query->num_rows > 0) {

		$query->fetch();
		$query->close();
		$b_name = $_REQUEST['b_name'];
        $b_comment = $_REQUEST['b_comment'];
        $b_check = $_REQUEST['b_check'];
        $b_sum = $_REQUEST['b_sum'];

        if (($b_check == $b_sum) && ($b_name != "") && ($b_comment != "")) {

            $query = $mysqli->prepare("INSERT INTO m_comments (mid, name, comment, posttime) VALUES (?, ?, ?, NOW())");
            $query->bind_param('sss',$bid,$b_name,$b_comment);
            $query->execute();
            $query->close();

    


	$e_subject = "MM Discussion Board Update";
	
	$msg1 = "<html><body>";
	$msg5 = "</body></html>";
	ob_start();
?>
	A new comment has been posted on the discussion board for <? echo $b_bowlname; ?>!<br><br>

	<table width="80%" align="center" border="1">
            <tr>
                <td align="left">Posted by <b><? echo $b_name; ?></b></td>
            </tr>
            <tr>
                <td align="left"><p style="white-space: pre-wrap;"><? echo $b_comment; ?></p></td>
            </tr>
	</table>
	<br>
	You can see all comments and reply to the comment above by visiting the discussion board at <a href="http://math.roanoke.edu/mm/index.php?action=comments&bid=<? echo $bid; ?>">this link</a>!<br><br>
<?
	$msg3 = ob_get_contents();

	    // time to send emails!

    require '/etc/PHPMail/PHPMailer-master/PHPMailerAutoload.php';

    $currentemail = '';

    $query = $mysqli->prepare("SELECT firstname, lastname, email, id FROM m_entries WHERE mid = ? AND optout = 0 ORDER BY email ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($e_fname, $e_lname, $e_email, $e_id);

    while ($query->fetch()) {

        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'receive.roanoke.edu';  // Specify main and backup server
        $mail->SMTPAuth = false;                               // Enable SMTP authentication

        $mail->From = 'taylor@roanoke.edu';
        $mail->FromName = 'RC March Madness System';

        $mail->addAddress($e_email, $e_fname . " " . $e_lname);  // Add a recipient

        $mail->addReplyTo('taylor@roanoke.edu', 'RC March Madness System');

        $mail->WordWrap = 80;                                 // Set word wrap to 50 characters
        $mail->isHTML(true);                                  // Set email format to HTML

        $msg2 = "Dear " . $e_fname . ":<br><br>";
		$msg4 = "If you wish to opt out of receiving discussion board updates through email, please <a href=\"http://math.roanoke.edu/mm/index.php?action=optout&eid=" . $e_id . "\">click here</a>!";
		
        $message = $msg1 . $msg2 . $msg3 . $msg4 . $msg5;

        $mail->Subject = $e_subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        if ($currentemail != $e_email) {
            $mail->send();
            $currentemail = $e_email;
        }

    }
	}
	}
	
    header("Location: index.php?action=comments&bid=" . $bid);
    die();

?> 
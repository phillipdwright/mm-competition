<?

    $bid = $_REQUEST['bid'];
    $subject = $_REQUEST['e_subject'];
    $greeting = $_REQUEST['e_greeting'];
    $e_round = $_REQUEST['e_round'];
    $message = $_REQUEST['e_message'];
    $board = $_REQUEST['e_board'];

    $msg1 = "<html><body>";
    $msg2 = '';
    $msg3 = $message;
    $msg35 = '';
    $msg4 = '';
    $msg5 = "</body></html>";

    if ($board == 1) { $msg35 = "<br><br>View and post on the <a href=\"http://math.roanoke.edu/mm/index.php?action=comments&bid=" . $bid . "\">discussion board here</a>.<br><br>"; }

    if ($e_round > 0) {
        
		ob_start();
		
		$round = $e_round - 1;
		
		switch ($round) {
            case 0:
                $r_name = "All Picks";
                break;
            case 1:
                $r_name = "Round of 32 Remaining Picks";
                break;
            case 2:
                $r_name = "Sweet Sixteen Remaining Picks";
                break;
            case 3:
                $r_name = "Elite Eight Remaining Picks";
                break;
            case 4:
                $r_name = "Final Four Remaining";
                break;
            case 5:
                $r_name = "Top Two Picks";
                break;
            case 6:
                $r_name = "Final Pick";
                break;
        }
?>
    <br>
    <table width="80%" align="center" border="1">
        <tr>
            <td align="left"><b><? echo $r_name; ?> and Point Standings</b></td>
        </tr>
        <tr>
            <td align="left">Below is a list of all or remaining picks for all participants; if an entry has the team corresponding to a particular column, that team's name is repeated in that entry's row.  Numbers appear next to each team that has 1 or more wins; the format (X/Y) means, for a given team, it has X wins, which according to our March Madness rules, grants Y points to that entry.  With the exception of "all" picks which are sorted by display name, entries are sorted by current points, remaining number of teams (for a given round), and then by username.</td>
        </tr>
    </table>
    <br><br>

    <table style="font-size: 80%;" align="center" border="1">
        <tr>
            <td align="center"><b>Username</b></td>
            <td align="center"><b>Points</b></td>
            <td align="center"><b>Remaining<br>Teams</b></td>
			<td align="center"><b>Possible<br>Points</b></td>
			<td align="center"><b>Initial<br>FTE EV</b></td>
			<td align="center"><b>Live<br>FTE EV</b></td>
<?
        $query = $mysqli->prepare("SELECT name, wins FROM m_teams WHERE mid = ? AND wins >= ? ORDER BY seed ASC, lid ASC");
        $query->bind_param('ss',$bid,$round);
        $query->execute();
        $query->store_result();
        $query->bind_result($t_name, $t_wins);

        while ($query->fetch()) {
            $pts = 0;
            if ($t_wins > 0) { $pts = $t_wins*$t_wins; }
            if ($t_wins == 6) { $pts = 37; }
?>
            <td align="center"><b><? echo $t_name; ?> <? if ($t_wins > 0) { echo "(" . $t_wins . "/" . $pts . ")"; } ?></b></td>
<?
        }
        $query->close();
?>
        </tr>
<?
        $query = $mysqli->prepare("SELECT id, displayname, points, remaining, possible, fte_ev, fte_live_ev FROM m_entries WHERE mid = ? ORDER BY points DESC, remaining DESC, displayname ASC");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($e_id, $e_dname, $e_points, $e_remaining, $e_possible, $e_fte, $e_live);

        while ($query->fetch()) {
?>
        <tr>
            <td align="center"><? echo $e_dname; ?></td>
            <td align="center"><? echo $e_points; ?></td>
            <td align="center"><? echo $e_remaining; ?></td>
            <td align="center"><? echo $e_possible; ?></td>
            <td align="center"><? echo round($e_fte, 2); ?></td>
            <td align="center"><? echo round($e_live, 2); ?></td>
<?
            $query2 = $mysqli->prepare("SELECT name, wins, id FROM m_teams WHERE mid = ? AND wins >= ? ORDER BY seed ASC, lid ASC");
            $query2->bind_param('ss',$bid,$round);
            $query2->execute();
            $query2->store_result();
            $query2->bind_result($t_name, $t_wins, $t_id);

            while ($query2->fetch()) {

                $pts = 0;
                if ($t_wins > 0) { $pts = $t_wins*$t_wins; }
                if ($t_wins == 6) { $pts = 37; }
                $query3 = $mysqli->prepare("SELECT id FROM m_entries_data WHERE eid = ? AND tid = ? AND mid = ?");
                $query3->bind_param('sss',$e_id,$t_id,$bid);
                $query3->execute();
                $query3->store_result();
                $num_rows = $query3->num_rows;
                $query3->close();

                if ($num_rows == 1) {
?>
            <td align="center"><? echo $t_name; ?> <? if ($t_wins > 0) { echo "(" . $t_wins . "/" . $pts . ")"; } ?></td>
<?
                } else {
                    echo "<td></td>";
                }
            }
?>
        </tr>
<?
        }
?>
    </table>
<?
		$msg4 = ob_get_contents();
	
	}

    // time to send emails!

    require '/etc/PHPMail/PHPMailer-master/PHPMailerAutoload.php';

    $currentemail = '';

    $query = $mysqli->prepare("SELECT firstname, lastname, email FROM m_entries WHERE mid = ? ORDER BY email ASC");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($e_fname, $e_lname, $e_email);

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

        if ($greeting == 1) { $msg2 = "Dear " . $e_fname . ":<br><br>"; }
        $message = $msg1 . $msg2 . $msg3 . $msg35 . $msg4 . $msg5;

        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = $message;

        if ($currentemail != $e_email) {
            $mail->send();
            $currentemail = $e_email;
        }

    }

    header("Location: index.php?action=admin");
    die();

?> 
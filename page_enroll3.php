<?

    $bid = $_REQUEST['bid'];

    $query = $mysqli->prepare("SELECT id, name FROM m_events WHERE id = ? AND starttime >= NOW()");
    $query->bind_param('s',$bid);
    $query->execute();
    $query->store_result();
    $query->bind_result($b_id, $b_name);

    if ($query->num_rows == 0) {
?>
<br><br>

    <table width="70%" align="center" border="1">
        <tr>
            <td align="left">The requested pool does not exist or is not eligible for enrollment because the March Madness season has already begun.  If you feel that this is an error, please contact the Contest Administrator.</td>
        </tr>
    </table>
<?
        $query->close();
    } else {
        $query->fetch();
        $query->close();

        $b_fname = $_REQUEST['b_fname'];
        $b_lname = $_REQUEST['b_lname'];
        $b_dname = $_REQUEST['b_dname'];
        $b_email = $_REQUEST['b_email'];

        $query = $mysqli->prepare("INSERT INTO m_entries (mid, firstname, lastname, displayname, email, enrolltime) VALUES (?, ?, ?, ?, ?, NOW())");
        $query->bind_param('sssss',$b_id,$b_fname,$b_lname,$b_dname,$b_email);
        $query->execute();
        $e_id = $query->insert_id;
        $query->close();

        $total1 = 0; $total2 = 0; $total3 = 0; $total4 = 0; $total5 = 0; $total6 = 0;

        $query = $mysqli->prepare("SELECT id, seed FROM m_teams WHERE mid = ? ORDER BY seed ASC, lid ASC");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($t_id, $t_seed);

        while ($query->fetch()) {

            $req_string = 'team_' . $t_id;
            $team_picked = $_REQUEST[$req_string];

            if ($team_picked > 0) {

                $query2 = $mysqli->prepare("INSERT INTO m_entries_data (mid, eid, tid) VALUES (?, ?, ?)");
                $query2->bind_param('sss',$bid, $e_id, $t_id);
                $query2->execute();
                $query2->close();

                switch ($t_seed) {
                    case 1:
                        $total1++;
                        break;
                    case 2:
                    case 3:
                        $total2++;
                        break;
                    case 4:
                    case 5:
                    case 6:
                        $total3++;
                        break;
                    case 7:
                    case 8:
                    case 9:
                    case 10:
                        $total4++;
                        break;
                    case 11:
                    case 12:
						$total5++;
						break;
                    case 13:
                    case 14:
                    case 15:
                    case 16:
                        $total6++;
                        break;
                }
            }
        }
        $query->close();

        // apparently we've processed the data -- let's see what we get here to display the confirmation.  check things

        $error = 0;
        if ($total1 != 2) { $error += 1; }
        if ($total2 != 3) { $error += 2; }
        if ($total3 != 4) { $error += 4; }
        if ($total4 != 5) { $error += 8; }
        if ($total5 != 4) { $error += 16; }
		if ($total6 != 4) { $error += 32; }
?>
        <br><br>

        <table width="70%" align="center" border="1">
            <tr>
                <td align="left">Your data has been recorded in the system and your confirmation appears below; note that your selected teams are underlined and in bold.  You will also receive a copy of your confirmation and picks via email at <? echo $b_email; ?>.  If you do not receive this email soon, please contact the Contest Administrator.<br><br><b>At this time, please send your $1.00 donation to David Taylor, MCSP Department (if sending from off-campus, 221 College Lane, Salem, VA 24153 is the mailing address).  Donations will be spread out amongst the first, second, and last place finishers.</b><br><br>If you wish to make any changes to this entry (as opposed to creating a second entry), please reply to the email confirmation with the changes you need made before enrollment closes.</td>
            </tr>
        </table>

        <br><br>

<?
        ob_start();
?>

        <table width="70%" align="center" border="1">
            <tr>
                <td align="center" colspan="5"><b>March Madness Entry Confirmation for <? echo $b_name; ?></b></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>Name / Display Name:</b></td>
                <td colspan="3" align="left"><? echo $b_fname . ' ' . $b_lname . ' / ' . $b_dname; ?></td>
            </tr>
            <tr>
                <td colspan="2" align="right"><b>Email Address:</b></td>
                <td colspan="3" align="left"><? echo $b_email; ?></td>
            </tr>
            <?
            if ($error > 0) {
?>
                <tr>
                    <td colspan="5" align="left">An error code of <? echo $error; ?> has be reported and sent to the
                        Bowl System administrator; you do not need to do anything at this time except be on the lookout
                        for an email from the administrator.
                    </td>
                </tr>
<?
            }
?>
            <tr>
                <td align="center"><b>Seed</b></td>
                <td align="center"><b>Midwest</b></td>
                <td align="center"><b>West</b></td>
                <td align="center"><b>East</b></td>
                <td align="center"><b>South</b></td>
             </tr>
<?
        $query = $mysqli->prepare("SELECT id, seed, name, lid FROM m_teams WHERE mid = ? ORDER BY seed ASC, lid ASC");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($t_id, $t_seed, $t_name, $t_lid);

        while ($query->fetch()) {

            if ($t_lid == 1) {
?>
                <tr>
                    <td align="center"><? echo $t_seed; ?></td>
<?
            }
?>
                    <td align="center">
<?
                $req_string = 'team_' . $t_id;
                $team_picked = $_REQUEST[$req_string];

                if ($team_picked > 0) {
                    echo "<b><u>" . $t_name . "</u></b>";
                } else {
                    echo $t_name;
                }
?>
                    </td>
<?
            if ($t_lid == 4) {
?>
                </tr>
<?
                if (($t_seed == 1) || ($t_seed == 3) || ($t_seed == 6) || ($t_seed == 10) || ($t_seed == 12)) {
?>
                <tr>
                    <td colspan="5"></td>
                </tr>
<?
                }
            }
        }
?>
            </table>
<?
        $content = ob_get_clean();
        echo $content;

        $message = "<html><body>Dear " . $b_fname . ":<br><br>You recently created an entry for the " . $b_name . " contest and your entry has been received successfully.  Your selected teams are below (chosen teams appear underlined and in bold).  You will receive updates to the contest at this email address as the contest proceeds, beginning with a list of all picks for participants once March Madness get underway.<br><br>Note that you should send your $1.00 donation to David Taylor, MCSP Department, as soon as possible (from off-campus, donations can be sent to him at 221 College Lane, Salem, VA 24153).<br><br>" . $content . "<br>If you wish to make any changes to this entry (as opposed to creating a second entry), please reply to this email with the changes you need made before enrollment closes.<br><br>Error Code (Should Be 0): " . $error . "</body></html>";

        require '/etc/PHPMail/PHPMailer-master/PHPMailerAutoload.php';

        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'receive.roanoke.edu';  // Specify main and backup server
        $mail->SMTPAuth = false;                               // Enable SMTP authentication

        $mail->From = 'taylor@roanoke.edu';
        $mail->FromName = 'RC March Madness System';

        $mail->addAddress($b_email, $b_fname . " " . $b_lname);  // Add a recipient
        $mail->addCC('taylor@roanoke.edu', 'David Taylor');

        $mail->addReplyTo('taylor@roanoke.edu', 'RC March Madness System');

        $mail->WordWrap = 80;                                 // Set word wrap to 50 characters
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'RC March Madness System - Entry Confirmation';
        $mail->Body    = $message;
        $mail->AltBody = $message;

        $mail->send();

    }


?>




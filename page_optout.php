<?

    $user_id = $_REQUEST['eid'];

    $query2 = $mysqli->prepare("UPDATE m_entries SET optout = 1 WHERE id = ?");
	$query2->bind_param('s',$user_id);
	$query2->execute();
	$query2->close();
?>
    <table width="70%" align="center" border="1">
        <tr>
            <td align="left">You will not receive further emails from the March Madness system concerning discussion board updates.  If you change your mind at some point, please contact the Contest Administrator who can opt you back in to receive email discussion board updates.</td>
        </tr>
    </table>
<?

	$query = $mysqli->prepare("SELECT email, mid FROM m_entries WHERE id = ? LIMIT 1");
	$query->bind_param('s',$user_id);
	$query->execute();
	$query->store_result();
	$query->bind_result($b_email, $b_mid);

	while($query->fetch()) {
		
		$query2 = $mysqli->prepare("UPDATE m_entries SET optout = 1 WHERE email = ? AND mid = ?");
		$query2->bind_param('ss',$b_email,$b_mid);
		$query2->execute();
		$query2->close();
		
	}
	
	$query->close();
?>

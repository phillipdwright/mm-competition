<?
    $bid = $_REQUEST['bid'];
?>
        <br><br>

        <table width="80%" align="center" border="1">
                <tr>
                        <td align="left" colspan="6"><b>Enrollments</b></td>
                </tr>
                <tr>
                        <td align="center">Name</td>
                        <td align="center">Display Name</td>
                        <td align="center">Donated?</td>
                        <td align="center">Toggle Donation</td>
						<td align="center">Opted Out?</td>
						<td align="center">Toggle Opt Out</td>
                </tr>
<?

        $query = $mysqli->prepare("SELECT id, firstname, lastname, displayname, paid, optout FROM m_entries WHERE mid = ? ORDER BY paid ASC, lastname ASC, firstname ASC, displayname ASC");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($user_id,$firstname,$lastname,$displayname,$paid, $optout);
		$totalEnrollments = 0;
		$totalDonations = 0;

        while($query->fetch()) {
			$totalEnrollments++;
?>
                <tr>
                        <td align="left"><? echo $lastname . ", " . $firstname; ?></td>
                        <td align="center"><? echo $displayname; ?></td>
                        <td align="center"><? if ($paid == 1) { echo "Y"; $totalDonations++; } ?></td>
                        <td align="center"><a href="./index.php?action=toggledonation&eid=<? echo $user_id; ?>">toggle donation</a></td>
						<td align="center"><? if ($optout == 1) { echo "Y"; } ?></td>
						<td align="center"><a href="./index.php?action=toggleoptout&eid=<? echo $user_id; ?>">toggle optout</a></td>
                </tr>
<?
        }

        $query->close();
?>
                <tr>
                        <td align="left" colspan="6"><b>Total Enrollments: <? echo $totalEnrollments; ?> and Total Donations: <? echo $totalDonations; ?></b></td>
                </tr>
        </table>

        <br><br>

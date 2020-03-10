<?

    $bid = $_REQUEST['bid'];

?>
        <br><br>

        <table width="80%" align="center" border="1">
        <form action="./index.php?action=sendemail2" method="post">
            <input type="hidden" name="bid" value="<? echo $bid; ?>">
            <tr>
                <td width="20%" align="right">
                    Email Subject:
                </td>
                <td width="80%" align="center">
                    <input type="text" name="e_subject" length="400">
                </td>
            </tr>
            <tr>
                <td width="20%" align="right">
                    Start with "Dear Firstname"?:
                </td>
                <td width="80%" align="center">
                    <input type="checkbox" name="e_greeting" value="1"> Yes
                </td>
            </tr>
            <tr>
                <td width="20%" align="right">
                    Include Discussion Board Link?:
                </td>
                <td width="80%" align="center">
                    <input type="checkbox" name="e_board" value="1" checked> Yes
                </td>
            </tr>
            <tr>
                <td width="20%" align="right">
                    Include Round Data and Points?:
                </td>
                <td width="80%" align="center">
                    <input type="radio" name="e_round" value="0"> None <br>
                    <input type="radio" name="e_round" value="1"> 64 (All Picks) <br>
                    <input type="radio" name="e_round" value="2"> 32 <br>
                    <input type="radio" name="e_round" value="3"> 16 (Sweet Sixteen) <br>
                    <input type="radio" name="e_round" value="4"> 8 (Elite Eight) <br>
                    <input type="radio" name="e_round" value="5"> 4 (Final Four) <br>
                    <input type="radio" name="e_round" value="6"> 2 (Top Two) <br>
                    <input type="radio" name="e_round" value="7"> 1 (Winner) <br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    Email Message (HTML):
                </td>
                <td align="center">
                    <textarea name="e_message" cols="75" rows="8"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                        <input type="submit" value="Send Emails">
                </td>
            </tr>
        </form>
        </table>

        <br><br> 
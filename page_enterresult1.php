<?

        $bid = $_REQUEST['bid'];
?>
        <br><br>
        <table width="90%" align="center" border="1">
            <tr>
                <td align="left">To enter results, click the winner in each part of the bracket; winners should proceed forward.</td>
            </tr>
        </table>
        <br><br>

        <table width="90%" style="font-size: 75%;" align="center">
            <tr>
                <td colspan="10" align="center"><b>Midwest</b></td>
                <td></td>
                <td colspan="10" align="center"><b>East</b></td>
            </tr>
<!-- ROW 1 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 2 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 1 OR seed = 16) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 1 OR seed = 16) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 3 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 16");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 16");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 4 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 1 OR seed = 16 OR seed = 8 OR seed = 9) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 1 OR seed = 16 OR seed = 8 OR seed = 9) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 5 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 8");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 8");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 6 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 8 OR seed = 9) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 8 OR seed = 9) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 7 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 9");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 9");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 8 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 1 OR seed = 16 OR seed = 8 OR seed = 9 OR seed = 5 OR seed = 12 OR seed = 4 OR seed = 13) AND wins >= 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=4"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 1 OR seed = 16 OR seed = 8 OR seed = 9 OR seed = 5 OR seed = 12 OR seed = 4 OR seed = 13) AND wins >= 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=4"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 9 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 5");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 5");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 10 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 5 OR seed = 12) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 5 OR seed = 12) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 11 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 12");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 12");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 12 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 5 OR seed = 12 OR seed = 4 OR seed = 13) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 5 OR seed = 12 OR seed = 4 OR seed = 13) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 13 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 4");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 4");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 14 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 4 OR seed = 13) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 4 OR seed = 13) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 15 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 13");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 13");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 16 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND wins >= 4");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=5"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td>--></td>
                <td>
<?
        $m_name = ""; $m_seed = ""; $m_lid = "";
        $query = $mysqli->prepare("SELECT name, seed, lid FROM m_teams WHERE mid = ? AND (lid = 1 OR lid = 3) AND wins >= 5");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed, $m_lid);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=<? echo $m_lid; ?>&seed=<? echo $m_seed; ?>&round=6"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td><--</td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND wins >= 4");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=5"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 17 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 6");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 6");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 18 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 6 OR seed = 11) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 6 OR seed = 11) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 19 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 11");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 11");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 20 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 6 OR seed = 11 OR seed = 3 OR seed = 14) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 6 OR seed = 11 OR seed = 3 OR seed = 14) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 21 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 22 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 3 OR seed = 14) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 3 OR seed = 14) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 23 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 14");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 14");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 24 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 6 OR seed = 11 OR seed = 3 OR seed = 14 OR seed = 7 OR seed = 10 OR seed = 2 OR seed = 15) AND wins >= 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=4"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 6 OR seed = 11 OR seed = 3 OR seed = 14 OR seed = 7 OR seed = 10 OR seed = 2 OR seed = 15) AND wins >= 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=4"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 25 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 7");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 7");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 26 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 7 OR seed = 10) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 7 OR seed = 10) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 27 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 10");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 10");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 28 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 7 OR seed = 10 OR seed = 2 OR seed = 15) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 7 OR seed = 10 OR seed = 2 OR seed = 15) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 29 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 30 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND (seed = 2 OR seed = 15) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND (seed = 2 OR seed = 15) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 31 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 1 AND seed = 15");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=1&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 3 AND seed = 15");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=3&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
        </table>
        <br>
<!-- OVERALL WINNER -->
        <table width="90%" style="font-size: 75%;" align="center">
            <tr>
                <td></td>
                <td align="center">v</td>
                <td></td>
            </tr>
            <tr>
                <td align="right">&gt;</td>
                <td align="center">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND wins >= 6");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
            echo $m_name;
        }
?>
                </td>
                <td align="left">&lt;</td>
            </tr>
            <tr>
                <td></td>
                <td align="center">^</td>
                <td></td>
            </tr>
        </table>
        <br>
<!-- WEST AND SOUTH ------------------------------------------>
        <table width="90%" style="font-size: 75%;" align="center">
            <tr>
                <td colspan="10" align="center"><b>West</b></td>
                <td></td>
                <td colspan="10" align="center"><b>South</b></td>
            </tr>
<!-- ROW 1 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 2 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 1 OR seed = 16) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 1 OR seed = 16) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 3 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 16");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 16");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 4 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 1 OR seed = 16 OR seed = 8 OR seed = 9) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 1 OR seed = 16 OR seed = 8 OR seed = 9) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 5 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 8");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 8");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 6 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 8 OR seed = 9) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 8 OR seed = 9) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 7 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 9");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 9");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 8 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 1 OR seed = 16 OR seed = 8 OR seed = 9 OR seed = 5 OR seed = 12 OR seed = 4 OR seed = 13) AND wins >= 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=4"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 1 OR seed = 16 OR seed = 8 OR seed = 9 OR seed = 5 OR seed = 12 OR seed = 4 OR seed = 13) AND wins >= 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=4"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 9 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 5");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 5");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 10 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 5 OR seed = 12) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 5 OR seed = 12) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 11 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 12");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 12");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 12 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 5 OR seed = 12 OR seed = 4 OR seed = 13) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 5 OR seed = 12 OR seed = 4 OR seed = 13) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 13 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 4");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 4");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 14 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 4 OR seed = 13) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 4 OR seed = 13) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 15 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 13");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 13");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 16 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND wins >= 4");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=5"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td>--></td>
                <td>
<?
        $m_name = ""; $m_seed = ""; $m_lid = "";
        $query = $mysqli->prepare("SELECT name, seed, lid FROM m_teams WHERE mid = ? AND (lid = 2 OR lid = 4) AND wins >= 5");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed, $m_lid);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=<? echo $m_lid; ?>&seed=<? echo $m_seed; ?>&round=6"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td><--</td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND wins >= 4");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=5"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 17 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 6");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 6");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 18 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 6 OR seed = 11) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 6 OR seed = 11) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 19 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 11");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 11");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 20 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 6 OR seed = 11 OR seed = 3 OR seed = 14) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 6 OR seed = 11 OR seed = 3 OR seed = 14) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 21 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 22 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 3 OR seed = 14) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 3 OR seed = 14) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 23 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 14");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 14");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 24 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 6 OR seed = 11 OR seed = 3 OR seed = 14 OR seed = 7 OR seed = 10 OR seed = 2 OR seed = 15) AND wins >= 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=4"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 6 OR seed = 11 OR seed = 3 OR seed = 14 OR seed = 7 OR seed = 10 OR seed = 2 OR seed = 15) AND wins >= 3");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=4"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 25 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 7");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 7");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 26 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 7 OR seed = 10) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 7 OR seed = 10) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 27 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 10");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 10");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 28 ---------------------------------------------------------->
            <tr>
                <td><hr></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 7 OR seed = 10 OR seed = 2 OR seed = 15) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 7 OR seed = 10 OR seed = 2 OR seed = 15) AND wins >= 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=3"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td><hr></td>
            </tr>
<!-- ROW 29 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed= <? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 2");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
<!-- ROW 30 ---------------------------------------------------------->
            <tr>
                <td></td>
                <td></td>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND (seed = 2 OR seed = 15) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <? echo $m_seed; ?> <a
                href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND (seed = 2 OR seed = 15) AND wins >= 1");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
        if ($m_seed > 0) {
?>
            <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=2"><? echo $m_name; ?></a> <? echo $m_seed; ?>
<?
        }
?>
                </td>
                <td></td>
                <td></td>
            </tr>
<!-- ROW 31 ---------------------------------------------------->
            <tr>
                <td align="left">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 2 AND seed = 15");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <? echo $m_seed; ?> <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=2&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td align="right">
<?
        $m_name = ""; $m_seed = "";
        $query = $mysqli->prepare("SELECT name, seed FROM m_teams WHERE mid = ? AND lid = 4 AND seed = 15");
        $query->bind_param('s',$bid);
        $query->execute();
        $query->store_result();
        $query->bind_result($m_name, $m_seed);
        $query->fetch();
        $query->close();
?>
                    <a href="./index.php?action=enterresult2&bid=<? echo $bid; ?>&lid=4&seed=<? echo $m_seed; ?>&round=1"><? echo $m_name; ?></a> <? echo $m_seed; ?>
                </td>
            </tr>
        </table>
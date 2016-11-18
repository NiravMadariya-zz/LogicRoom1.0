<?
include_once("../includeme.php");
if(!isset($_SESSION['username']))
{
	header("location:../login/");
}
else
{
	$result=mysql_query("select * from client_mast where username='".$_SESSION['username']."'");
	$row = mysql_fetch_row($result);	}
	$_SESSION['page']="Settings";
	?>
	<!DOCTYPE html>
	<head><title>Settings | LogicRoom.in</title>
	<?
	include("csslinkFiles.php");
	?>
	</head>
	<?
	include("includeFile.php");
	?>
	<div class="content-wrapper">
	        <div class="content">
			<ol class="breadcrumb">
		        <li><a href="settings.php">Settings</a></li>
			</ol>
			<blockquote><font size="5">Settings</font></blockquote>
	
	<br /><br />
	<form action="editSettings.php" method=Post>
	<table border=1 bordercolor=orange align=center>
		<tr height=40>
			<td width=150 align=center>
				Display Name : &nbsp;&nbsp;&nbsp;
			</td>
			<td width=200 align=center>
			<?
				if(isset($_GET['edit']) && $_GET['edit']=="edname") {
					echo "<input type=text name='edname' placeHolder=".$row[0]." />";
					echo "</td><td width=70 align=center>";
					echo "<input type=submit value='Save' />";
					echo "</td>";
				}
				else
				{
					echo "<label>".$row[0]."</label>";	
					echo "</td><td align='center' width=70>";
					echo "<a href='settings.php?edit=edname'>Edit</a>";
					echo "</td>";
				}
			?>
		</tr>
		<tr height=35>
			<td align=center>
				User Name : 
			</td> <td align=center>
			<?
				if(isset($_GET['edit']) && $_GET['edit']=="username") {
					echo "<input type=text name='username' placeHolder='".$row[1]."' />";
					echo "</td><td align=center>";
					echo "<input type=submit value='Save' />";
					echo "</td>";
				}
				else
				{
					echo "<label>".$row[1]."</label>";	
					echo "</td><td align='center'>";
					echo "<a href='settings.php?edit=username'>Edit</a>";
					echo "</td>";
				}
			?>
		</tr>
		<tr height=35>
			<td align=center>
				Password : 
			</td>
			<td width=205 align=center>
			<?
				if(isset($_GET['edit']) && $_GET['edit']=="pass") {
					echo "<input type=text name='pass' placeHolder=".$row[2]." />";
					echo "</td><td align=center>";
					echo "<input type=submit value='Save' />";
					echo "</td>";
				}
				else
				{
					echo "<label>".$row[2]."</label>";	
					echo "</td><td align='center'>";
					echo "<a href='settings.php?edit=pass'>Edit</a>";
					echo "</td>";
				}
			?>
				<!--<input type=password name="pass" value="123456789" />
			</td>
			<td align=center><input type=submit value="Save" /></td>-->
		</tr>
		<tr height=35>
			<td align=center>
				Primary E-Mail : 
			</td>
			<td width=205 align=center>
			<label><?echo $row[3];?></label>
			</td>
		</tr>
		<tr height=35>
			<td align=center>
				Secondary E-Mail : 
			</td>
			<td align=center>
			<?
				if(isset($_GET['edit']) && $_GET['edit']=="semail") {
					echo "<input type=text name='upsemails' placeHolder='".$row[4]."' />";
					echo "</td><td align='center'>";
					echo "<input type=submit value='Save' />";
					echo "</td>";
				}
				else
				{
					echo "<label>".$row[4]."</label>";	
					echo "</td><td align='center'>";
					echo "<a href='settings.php?edit=semail'>Edit</a>";
					echo "</td>";
				}
			?>
		</tr>
		<tr height=35>
			<td align=center>
				Recovery E-Mail : 
			</td><td align=center>
			<?
				if(isset($_GET['edit']) && $_GET['edit']=="remail") {
					echo "<input type=text name='remail' placeHolder=".$row[5]." />";
					echo "</td><td align='center'>";
					echo "<input type=submit value='Save' />";
					echo "</td>";
				}
				else
				{
					echo "<label>".$row[5]."</label>";	
					echo "</td><td align='center'>";
					echo "<a href='settings.php?edit=remail'>Edit</a>";
					echo "</td>";
				}
			?>
		</tr>
		</table>
		</form>
	</div></div>
	<?include("closingFile.php");?><?include("jslinkFiles.php");?>
	</body>
</html>
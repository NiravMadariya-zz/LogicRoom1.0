<%@ Page Language="C#" %>

<!DOCTYPE html>
<html>
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form2" runat="server">
    <table border="0" align="center">
        <tr><td class="auto-style1"><asp:Label ID="Label1" runat="server" Text="Enter Name :"></asp:Label></td>
        <td class="auto-style2"><asp:TextBox ID="txtuname" runat="server" Height="24px" Width="139px"></asp:TextBox></td></tr>
        <tr><td class="auto-style1"><asp:Label ID="Label2" runat="server" Text="Enter Password :"></asp:Label></td>
        <td class="auto-style2"><asp:TextBox ID="txtpass" runat="server" Height="24px" Width="139px" TextMode="Password"></asp:TextBox></td></tr>
        <tr><td colspan="2" align="center"><asp:Button ID="cmdsubmit" runat="server" Text="Submit" OnClick="cmdsubmit_Click"/></td></tr>

    </table>
    </form>
</body>
</html>
protected void Page_Load(object sender, EventArgs e)
        {
            if (Session["uname"]==null)
            {
                Response.Redirect("login.aspx");
            }
            else
            {
                SqlConnection cn = new SqlConnection(@"{Connection String}");
                SqlDataAdapter da = new SqlDataAdapter("select * from {Table Name}", cn);
                DataSet dtstud = new DataSet();
                da.Fill(dtstud);
                Response.Write("<table border='1' bordercolor='purple' align='center'>");
                Response.Write("<th>User Name<th>Full Name<th>Address<th>College<th>Phone No.<th>State");
                for (int i = 0; i < dtstud.Tables[0].Rows.Count; i++)
                {
                    Response.Write("<tr>");
                    for (int j = 0; j < dtstud.Tables[0].Columns.Count; j++)
                    {
                        Response.Write("<td>" + dtstud.Tables[0].Rows[i][j].ToString() + "</td>");
                    }
                    Response.Write("</tr>");
                }
            }
        }
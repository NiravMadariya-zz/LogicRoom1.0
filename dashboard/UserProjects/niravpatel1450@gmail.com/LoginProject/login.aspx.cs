protected void cmdsubmit_Click(object sender, EventArgs e)
        {
            if (txtuname.Text.Equals("BJPAdmin") && txtpass.Text.Equals("Bjp@dmin1"))
            {
                Session["uname"] = txtuname.Text;
                Response.Redirect("index.aspx");
            }
        }
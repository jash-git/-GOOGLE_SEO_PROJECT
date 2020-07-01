using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CS_webkit
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            WebKit.WebKitBrowser browser = new WebKit.WebKitBrowser();
            browser.Dock = DockStyle.Fill;
            this.Controls.Add(browser);
            browser.Navigate("http://jashliao.eu/wordpress/");
        }
    }
}

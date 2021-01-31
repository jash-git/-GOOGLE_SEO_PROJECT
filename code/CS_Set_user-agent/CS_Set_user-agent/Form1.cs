using System;
using System.Collections;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CS_Set_user_agent
{
    public partial class Form1 : Form
    {
        public bool[] m_blnPing = new bool[2] {false,false};
        public static bool TcpSocketTest()
        {
            try
            {
                System.Net.Sockets.TcpClient client =
                    new System.Net.Sockets.TcpClient("www.google.com", 80);
                client.Close();
                return true;
            }
            catch (System.Exception ex)
            {
                return false;
            }
        }
        public ArrayList m_ALData = new ArrayList();
        public int m_intCount = 1;
        public int m_ALindex = 0;
        public Form1()
        {
            InitializeComponent();

        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            timer1.Enabled = false;
            label1.Text = DateTime.Now.ToString("yyyy/MM/dd HH:mm:ss");
            m_blnPing[1] = TcpSocketTest();
            if ( (m_intCount==0) || (m_blnPing[1]^m_blnPing[0]))
            {
                foreach (var process in Process.GetProcessesByName("opera"))
                {
                    try
                    {
                        process.Kill();
                    }
                    catch { }
                }

                Random R = new Random();
                m_ALindex = R.Next(0, (m_ALData.Count-1));
                this.Text = m_ALindex.ToString();
                textBox1.Text = m_ALData[m_ALindex].ToString();
                ProcessStartInfo start = new ProcessStartInfo();
                string path = System.Windows.Forms.Application.StartupPath;
                //start.FileName = "C:\\Users\\user\\Downloads\\brave-portable-win64-1.14.81-64\\brave-portable.exe";  // Specify exe name.
                start.FileName = path + "\\Opera\\73.0.3856.344\\opera.exe";
                start.Arguments = String.Format(" http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php --user-agent=\"{0}\"", textBox1.Text);
                start.UseShellExecute = false;
                start.RedirectStandardOutput = false;
                Process p01 = Process.Start(start);
                this.WindowState = FormWindowState.Maximized;
                //this.TopMost = true;
                
            }

            m_blnPing[0] = m_blnPing[1];

            m_intCount++;
            if (m_intCount>60*15)
            {
                m_intCount = 0;
            }
            timer1.Enabled = true;
        }
        
        private void Form1_Load(object sender, EventArgs e)
        {
            this.Text = Environment.GetFolderPath(Environment.SpecialFolder.MyVideos).Replace("Videos", @"Downloads\brave-portable-win64-1.14.81-64\data\Default\Extensions\bmhfelbhbkeoldaiphchjibggnoodpcj\0.1.4_0\lib");

            StreamReader sr = new StreamReader("List.txt");
            while (!sr.EndOfStream)// 每次讀取一行，直到檔尾
            {
                m_ALData.Add(sr.ReadLine());// 讀取文字到 line 變數
            }
            sr.Close();// 關閉串流
        }
    }
}

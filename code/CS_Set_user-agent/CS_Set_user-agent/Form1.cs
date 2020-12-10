using System;
using System.Collections;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CS_Set_user_agent
{
    public partial class Form1 : Form
    {
        public ArrayList m_ALData = new ArrayList();
        public int m_intCount = 0;
        public int m_ALindex = 0;
        public Form1()
        {
            InitializeComponent();
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            label1.Text = DateTime.Now.ToString("yyyy/MM/dd HH:mm:ss");
            if(m_intCount==0)
            {
                foreach (var process in Process.GetProcessesByName("brave"))
                {
                    process.Kill();
                }

                Random R = new Random();
                m_ALindex = R.Next(0, (m_ALData.Count-1));
                this.Text = m_ALindex.ToString();
                textBox1.Text = m_ALData[m_ALindex].ToString();
                ProcessStartInfo start = new ProcessStartInfo();
                start.FileName = "C:\\Users\\jashliao\\Downloads\\brave-portable-win32-1.14.81-64\\brave-portable.exe";  // Specify exe name.
                start.Arguments = String.Format(" http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php http://jashliao.eu/google_seo/index02.php --user-agent=\"{0}\"", textBox1.Text);
                start.UseShellExecute = false;
                start.RedirectStandardOutput = false;
                Process p01 = Process.Start(start);
                this.WindowState = FormWindowState.Maximized;
                this.TopMost = true;
                
            }

            m_intCount++;
            if (m_intCount>60*30)
            {
                m_intCount = 0;
            }
            
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

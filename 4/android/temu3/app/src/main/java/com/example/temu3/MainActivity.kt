package com.example.temu3

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.temu3.references.GreetingActivity
import com.example.temu3.references.GuessNumberActivity
import com.example.temu3.references.HelloWorldActivity
import com.example.temu3.references.PartsListActivity
import com.example.temu3.references.SmartHomeClientActivity
import com.example.temu3.temu3.HitungUmurActivity
import com.example.temu3.temu3.KebunBinatangActivity
import com.example.temu3.temu3.SquadSoccerActivity
import com.example.temu3.temu4.HitungEmasActivity
import com.example.temu3.temu5.ToastDemoActivity
import com.example.temu3.temu5.WebViewActivity


class MainActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        // Pertemuan 3 buttons
        val kebunBinatangButton = findViewById<Button>(R.id.kebun_binatang)
        kebunBinatangButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                KebunBinatangActivity::class.java
            )
            startActivity(intent)
        }
        val squadSoccerButton = findViewById<Button>(R.id.squad_soccer)
        squadSoccerButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                SquadSoccerActivity::class.java
            )
            startActivity(intent)
        }
        val hitungUmurButton = findViewById<Button>(R.id.hitung_umur)
        hitungUmurButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                HitungUmurActivity::class.java
            )
            startActivity(intent)
        }

        // Pertemuan 4 buttons
        val hitungEmasButton = findViewById<Button>(R.id.hitung_emas)
        hitungEmasButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                HitungEmasActivity::class.java
            )
            startActivity(intent)
        }

        // Pertemuan 5 buttons
        val webViewTPLButton = findViewById<Button>(R.id.webview_tpl)
        webViewTPLButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                WebViewActivity::class.java
            )
            startActivity(intent)
        }
        val toastDemoButton = findViewById<Button>(R.id.toast_demo)
        toastDemoButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                ToastDemoActivity::class.java
            )
            startActivity(intent)
        }

        // References buttons
        val helloWorldButton = findViewById<Button>(R.id.hello_world)
        helloWorldButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                HelloWorldActivity::class.java
            )
            startActivity(intent)
        }
        val guessNumberButton = findViewById<Button>(R.id.guess_number)
        guessNumberButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                GuessNumberActivity::class.java
            )
            startActivity(intent)
        }
        val greetingAppButton = findViewById<Button>(R.id.greeting_app)
        greetingAppButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                GreetingActivity::class.java
            )
            startActivity(intent)
        }
        val smartHomeClientButton = findViewById<Button>(R.id.smart_home_client)
        smartHomeClientButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                SmartHomeClientActivity::class.java
            )
            startActivity(intent)
        }
        val partsListButton = findViewById<Button>(R.id.parts_list)
        partsListButton.setOnClickListener {
            val intent = Intent(
                this@MainActivity,
                PartsListActivity::class.java
            )
            startActivity(intent)
        }
    }
}

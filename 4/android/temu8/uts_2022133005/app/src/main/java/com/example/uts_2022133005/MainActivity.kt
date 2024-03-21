package com.example.uts_2022133005

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class MainActivity : AppCompatActivity() {

    private lateinit var edittext: Button
    private lateinit var scrollview: Button
    private lateinit var webview: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        edittext=findViewById(R.id.buttonEditText)
        scrollview=findViewById(R.id.buttonScrollView)
        webview = findViewById(R.id.buttonWebView)

        edittext.setOnClickListener {
            startActivity(Intent(this, Edittext::class.java))
        }

        scrollview.setOnClickListener {
            startActivity(Intent(this, Scrollview::class.java))
        }

        webview.setOnClickListener{
            startActivity(Intent(this, Webview::class.java))
        }
    }
}
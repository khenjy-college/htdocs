package com.example.uts_2022133005

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import androidx.appcompat.app.AppCompatActivity

class MainActivity : AppCompatActivity() {

    private lateinit var edittext: Button
    private lateinit var scrollview: Button
    private lateinit var webview:Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

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

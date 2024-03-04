package com.example.uts_2022133005

import android.content.Intent
import android.os.Bundle
import android.view.View
import android.widget.Button
import androidx.appcompat.app.AppCompatActivity
import com.example.uts_2022133005.EditTextActivity
import com.example.uts_2022133005.R
import com.example.uts_2022133005.ScrollViewActivity
import com.example.uts_2022133005.WebViewActivity


class MainActivity : AppCompatActivity() {

    private lateinit var edittext: Button
    private lateinit var scrollview: Button
    private lateinit var webview:Button


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        webview = findViewById(R.id.buttonWebView)

        webview.setOnClickListener{
            startActivity(Intent(this, WebViewActivity::class.java))
        }

        edittext=findViewById(R.id.buttonEditText)

        edittext.setOnClickListener {
            startActivity(Intent(this, EditTextActivity::class.java))
        }

        scrollview=findViewById(R.id.buttonScrollView)

        scrollview.setOnClickListener {
            startActivity(Intent(this, ScrollViewActivity::class.java))
        }
    }

}

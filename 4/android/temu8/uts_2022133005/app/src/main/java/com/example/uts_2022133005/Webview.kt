package com.example.uts_2022133005

// WebViewActivity.kt
import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import android.webkit.WebView
import android.webkit.WebViewClient

public final class Webview : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_webview)

        val webView: WebView = findViewById(R.id.webView)
        webView.webViewClient = WebViewClient()

        val webSettings = webView.settings
        webSettings.javaScriptEnabled = true

        // Load alamat web yang ditentukan
        webView.loadUrl("http://www.uvers.ac.id")
    }

    override fun onBackPressed() {
        val webView: WebView = findViewById(R.id.webView)
        // Kembali ke halaman sebelumnya dalam WebView jika ada, jika tidak, kembali ke activity sebelumnya
        if (webView.canGoBack()) {
            webView.goBack()
        } else {
            super.onBackPressed()
        }
    }
}

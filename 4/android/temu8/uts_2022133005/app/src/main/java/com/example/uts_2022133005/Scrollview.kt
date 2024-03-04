package com.example.uts_2022133005

import android.os.Bundle
import android.widget.GridLayout
import android.widget.ImageView
import androidx.appcompat.app.AppCompatActivity

class ScrollViewActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_scrollview)

        val gridLayout: GridLayout = findViewById(R.id.gridLayout)

    }
}

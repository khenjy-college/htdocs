package com.example.temu3

import android.os.Bundle
import android.net.Uri
import android.view.View
import android.widget.Button
import android.content.Intent
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.appcompat.app.AppCompatActivity
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.tooling.preview.Preview
import com.example.temu3.ui.theme.Temu3Theme

class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tugas)
        setContent {
            Temu2Theme {
                // A surface container using the 'background' color from the theme
                Surface(
                    modifier = Modifier.fillMaxSize(),
                    color = MaterialTheme.colorScheme.background
                ) {
                    Greeting("Android")
                }
            }
        }

    }

    public fun hitungnilai(View view) {
        Intent hitung = new Intent(Intent.ACTION_DIAL)
        hitungnilai.setData()
        startActivity(hitungnilai)
    }

    tugas.setOnClickListener{
        startActivity(Intent(this, tugas::class.java))
    }

}


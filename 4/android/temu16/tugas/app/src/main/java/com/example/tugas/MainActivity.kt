package com.example.tugas

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.tabel5.Tabel5MainActivity

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

        // Set click listeners for each button
        findViewById<Button>(R.id.buttonTabel1).setOnClickListener {
            handleButtonClick("tabel1")
        }

        findViewById<Button>(R.id.buttonTabel2).setOnClickListener {
            handleButtonClick("tabel2")
        }

        findViewById<Button>(R.id.buttonTabel3).setOnClickListener {
            handleButtonClick("tabel3")
        }

        findViewById<Button>(R.id.buttonTabel4).setOnClickListener {
            handleButtonClick("tabel4")
        }

        findViewById<Button>(R.id.buttonTabel5).setOnClickListener {
            handleButtonClick("tabel5")
        }

        findViewById<Button>(R.id.buttonTabel6).setOnClickListener {
            handleButtonClick("tabel6")
        }

        findViewById<Button>(R.id.buttonTabel7).setOnClickListener {
            handleButtonClick("tabel7")
        }

        findViewById<Button>(R.id.buttonTabel8).setOnClickListener {
            handleButtonClick("tabel8")
        }

        findViewById<Button>(R.id.buttonTabel9).setOnClickListener {
            handleButtonClick("tabel9")
        }

        findViewById<Button>(R.id.buttonTabel10).setOnClickListener {
            handleButtonClick("tabel10")
        }

        findViewById<Button>(R.id.buttonTabel11).setOnClickListener {
            handleButtonClick("tabel11")
        }
    }

    // Function to handle button clicks
    private fun handleButtonClick(tableName: String) {
        val intent = Intent(this, Class.forName("com.example.tugas.$tableName.${tableName.capitalize()}MainActivity"))
        startActivity(intent)
    }
}

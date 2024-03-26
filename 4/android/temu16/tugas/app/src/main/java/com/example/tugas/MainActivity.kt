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

        // Find all buttons
        val buttons = arrayOf(
            R.id.buttonTabel1, R.id.buttonTabel2, R.id.buttonTabel3,
            R.id.buttonTabel4, R.id.buttonTabel5, R.id.buttonTabel6,
            R.id.buttonTabel7, R.id.buttonTabel8, R.id.buttonTabel9,
            R.id.buttonTabel10, R.id.buttonTabel11
        )

        // Set click listeners for all buttons
        buttons.forEach { buttonId ->
            findViewById<Button>(buttonId).setOnClickListener {
                handleButtonClick(buttonId)
            }
        }
    }

    // Function to handle button clicks
    private fun handleButtonClick(buttonId: Int) {
        val tableName = resources.getResourceEntryName(buttonId).replace("button", "tabel")
        val intent = Intent(this, Class.forName("com.example.tugas.$tableName.${tableName.capitalize()}MainActivity"))
        startActivity(intent)
    }
}

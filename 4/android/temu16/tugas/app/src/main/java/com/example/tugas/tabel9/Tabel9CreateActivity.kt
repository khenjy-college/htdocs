package com.example.tugas.tabel9

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R
import com.example.tugas.tabel6.Tabel6MainActivity

class Tabel9CreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSave: Button

    private lateinit var tabel9field1: EditText
    private lateinit var tabel9field2: EditText
    private lateinit var tabel9field3: EditText
    private lateinit var tabel9field4: EditText

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel9_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, Tabel9MainActivity::class.java))
        }

        database = Database(this)
        tabel9field1 = findViewById(R.id.tabel9field1)
        tabel9field2 = findViewById(R.id.tabel9field2)
        tabel9field3 = findViewById(R.id.tabel9field3)
        tabel9field4 = findViewById(R.id.tabel9field4)
        btnSave = findViewById(R.id.btnSave)
        btnSave.setOnClickListener {
            val db = database.writableDatabase
            val tabel9field1Text = tabel9field1.text.toString()
            val tabel9field2Text = tabel9field2.text.toString()
            val tabel9field3Text = tabel9field3.text.toString()
            val tabel9field4Text = tabel9field4.text.toString()
            val tableName = getString(R.string.tabel9)
            db.execSQL("INSERT INTO $tableName (" +
                    "${getString(R.string.tabel9field1)}, " +
                    "${getString(R.string.tabel9field2)}, " +
                    "${getString(R.string.tabel9field3)}, " +
                    "${getString(R.string.tabel9field4)} " +
                    "VALUES ('$tabel9field1Text', '$tabel9field2Text', '$tabel9field3Text', '$tabel9field4Text')")
            Toast.makeText(this@Tabel9CreateActivity, "Data Saved", Toast.LENGTH_SHORT).show()
            Tabel9MainActivity.ma.refreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

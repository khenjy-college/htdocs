package com.example.tugas.tabel6

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

class Tabel6CreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSave: Button

    private lateinit var tabel6field1: EditText
    private lateinit var tabel6field2: EditText
    private lateinit var tabel6field3: EditText
    private lateinit var tabel6field4: EditText

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel6_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, Tabel6MainActivity::class.java))
        }

        database = Database(this)
        tabel6field1 = findViewById(R.id.tabel6field1)
        tabel6field2 = findViewById(R.id.tabel6field2)
        tabel6field3 = findViewById(R.id.tabel6field3)
        tabel6field4 = findViewById(R.id.tabel6field4)
        btnSave = findViewById(R.id.btnSave)
        btnSave.setOnClickListener {
            val db = database.writableDatabase
            val tabel6field1Text = tabel6field1.text.toString()
            val tabel6field2Text = tabel6field2.text.toString()
            val tabel6field3Text = tabel6field3.text.toString()
            val tabel6field4Text = tabel6field4.text.toString()
            val tableName = getString(R.string.tabel6)
            db.execSQL("INSERT INTO $tableName (" +
                    "${getString(R.string.tabel6field1)}, " +
                    "${getString(R.string.tabel6field2)}, " +
                    "${getString(R.string.tabel6field3)}, " +
                    "${getString(R.string.tabel6field4)} " +
                    "VALUES ('$tabel6field1Text', '$tabel6field2Text', '$tabel6field3Text', '$tabel6field4Text')")
            Toast.makeText(this@Tabel6CreateActivity, "Data Saved", Toast.LENGTH_SHORT).show()
            Tabel6MainActivity.ma.refreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

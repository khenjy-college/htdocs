package com.example.tugas.tabel7

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

class Tabel7CreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSave: Button

    private lateinit var tabel7field1: EditText
    private lateinit var tabel7field2: EditText
    private lateinit var tabel7field3: EditText
    private lateinit var tabel7field4: EditText

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel7_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, Tabel7MainActivity::class.java))
        }

        database = Database(this)
        tabel7field1 = findViewById(R.id.tabel7field1)
        tabel7field2 = findViewById(R.id.tabel7field2)
        tabel7field3 = findViewById(R.id.tabel7field3)
        tabel7field4 = findViewById(R.id.tabel7field4)
        btnSave = findViewById(R.id.btnSave)
        btnSave.setOnClickListener {
            val db = database.writableDatabase
            val tabel7field1Text = tabel7field1.text.toString()
            val tabel7field2Text = tabel7field2.text.toString()
            val tabel7field3Text = tabel7field3.text.toString()
            val tabel7field4Text = tabel7field4.text.toString()
            val tableName = getString(R.string.tabel7)
            db.execSQL("INSERT INTO $tableName (" +
                    "${getString(R.string.tabel7field1)}, " +
                    "${getString(R.string.tabel7field2)}, " +
                    "${getString(R.string.tabel7field3)}, " +
                    "${getString(R.string.tabel7field4)} " +
                    "VALUES ('$tabel7field1Text', '$tabel7field2Text', '$tabel7field3Text', '$tabel7field4Text')")
            Toast.makeText(this@Tabel7CreateActivity, "Data Saved", Toast.LENGTH_SHORT).show()
            Tabel7MainActivity.ma.refreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

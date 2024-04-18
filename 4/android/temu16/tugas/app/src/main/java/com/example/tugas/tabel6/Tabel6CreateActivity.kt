package com.example.tugas.tabel6

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
    private lateinit var btnSimpan: Button

    private lateinit var tabel6_field1: EditText
    private lateinit var tabel6_field2: EditText
    private lateinit var tabel6_field3: EditText
    private lateinit var tabel6_field4: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel6_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        database = Database(this)
        tabel6_field1 = findViewById(R.id.tabel6_field1)
        tabel6_field2 = findViewById(R.id.tabel6_field2)
        tabel6_field3 = findViewById(R.id.tabel6_field3)
        tabel6_field4 = findViewById(R.id.tabel6_field4)
        btnSimpan = findViewById(R.id.btnSimpan)
        btnSimpan.setOnClickListener {
            val db = database.writableDatabase
            val tabel6_field1Text = tabel6_field1.text.toString()
            val tabel6_field2Text = tabel6_field2.text.toString()
            val tabel6_field3Text = tabel6_field3.text.toString()
            val tabel6_field4Text = tabel6_field4.text.toString()
            val tableName = getString(R.string.tabel6)
            db.execSQL(
                "INSERT INTO $tableName (" +
                        "${getString(R.string.tabel6_field1)}, " +
                        "${getString(R.string.tabel6_field2)}, " +
                        "${getString(R.string.tabel6_field3)}, " +
                        "${getString(R.string.tabel6_field4)}) " +
                        "VALUES ('$tabel6_field1Text', '$tabel6_field2Text', '$tabel6_field3Text', '$tabel6_field4Text')"
            )
            Toast.makeText(this@Tabel6CreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
            Tabel6MainActivity.ma.RefreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

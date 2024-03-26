package com.example.tugas.tabel11

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R

class Tabel11CreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSimpan: Button

    private lateinit var tabel11_field1: EditText
    private lateinit var tabel11_field2: EditText
    private lateinit var tabel11_field3: EditText
    private lateinit var tabel11_field4: EditText
    private lateinit var tabel11_field5: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel11_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        database = Database(this)
        tabel11_field1 = findViewById(R.id.tabel11_field1)
        tabel11_field2 = findViewById(R.id.tabel11_field2)
        tabel11_field3 = findViewById(R.id.tabel11_field3)
        tabel11_field4 = findViewById(R.id.tabel11_field4)
        tabel11_field5 = findViewById(R.id.tabel11_field5)
        btnSimpan = findViewById(R.id.btnSimpan)
        btnSimpan.setOnClickListener {
            val db = database.writableDatabase
            val tabel11_field1Text = tabel11_field1.text.toString()
            val tabel11_field2Text = tabel11_field2.text.toString()
            val tabel11_field3Text = tabel11_field3.text.toString()
            val tabel11_field4Text = tabel11_field4.text.toString()
            val tabel11_field5Text = tabel11_field5.text.toString()
            val tableName = getString(R.string.tabel11)
            db.execSQL("INSERT INTO $tableName (" +
                    "${getString(R.string.tabel11_field1)}, " +
                    "${getString(R.string.tabel11_field2)}, " +
                    "${getString(R.string.tabel11_field3)}, " +
                    "${getString(R.string.tabel11_field4)}, " +
                    "${getString(R.string.tabel11_field5)}) " +
                    "VALUES ('$tabel11_field1Text', '$tabel11_field2Text', '$tabel11_field3Text', '$tabel11_field4Text', '$tabel11_field5Text')")
            Toast.makeText(this@Tabel11CreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
            Tabel11MainActivity.ma.RefreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

package com.example.tugas.tabel1

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R

class Tabel1CreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSimpan: Button

    private lateinit var tabel1_field1: EditText
    private lateinit var tabel1_field2: EditText
    private lateinit var tabel1_field3: EditText
    private lateinit var tabel1_field4: EditText
    private lateinit var tabel1_field5: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel1_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        database = Database(this)
        tabel1_field1 = findViewById(R.id.tabel1_field1)
        tabel1_field2 = findViewById(R.id.tabel1_field2)
        tabel1_field3 = findViewById(R.id.tabel1_field3)
        tabel1_field4 = findViewById(R.id.tabel1_field4)
        tabel1_field5 = findViewById(R.id.tabel1_field5)
        btnSimpan = findViewById(R.id.btnSimpan)
        btnSimpan.setOnClickListener {
            val db = database.writableDatabase
            val tabel1_field1Text = tabel1_field1.text.toString()
            val tabel1_field2Text = tabel1_field2.text.toString()
            val tabel1_field3Text = tabel1_field3.text.toString()
            val tabel1_field4Text = tabel1_field4.text.toString()
            val tabel1_field5Text = tabel1_field5.text.toString()
            val tableName = getString(R.string.tabel1)
            db.execSQL("INSERT INTO $tableName (" +
                    "${getString(R.string.tabel1_field1)}, " +
                    "${getString(R.string.tabel1_field2)}, " +
                    "${getString(R.string.tabel1_field3)}, " +
                    "${getString(R.string.tabel1_field4)}, " +
                    "${getString(R.string.tabel1_field5)}) " +
                    "VALUES ('$tabel1_field1Text', '$tabel1_field2Text', '$tabel1_field3Text', '$tabel1_field4Text', '$tabel1_field5Text')")
            Toast.makeText(this@Tabel1CreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
            Tabel1MainActivity.ma.RefreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

package com.example.tugas.tabel5

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R

class Tabel5CreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSimpan: Button

    private lateinit var tabel5_field1: EditText
    private lateinit var tabel5_field2: EditText
    private lateinit var tabel5_field3: EditText
    private lateinit var tabel5_field4: EditText
    private lateinit var tabel5_field5: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel5_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        database = Database(this)
        tabel5_field1 = findViewById(R.id.tabel5_field1)
        tabel5_field2 = findViewById(R.id.tabel5_field2)
        tabel5_field3 = findViewById(R.id.tabel5_field3)
        tabel5_field4 = findViewById(R.id.tabel5_field4)
        tabel5_field5 = findViewById(R.id.tabel5_field5)
        btnSimpan = findViewById(R.id.btnSimpan)
        btnSimpan.setOnClickListener {
            val db = database.writableDatabase
            val tabel5_field1Text = tabel5_field1.text.toString()
            val tabel5_field2Text = tabel5_field2.text.toString()
            val tabel5_field3Text = tabel5_field3.text.toString()
            val tabel5_field4Text = tabel5_field4.text.toString()
            val tabel5_field5Text = tabel5_field5.text.toString()
            val tableName = getString(R.string.tabel5)
            db.execSQL("INSERT INTO $tableName (" +
                    "${getString(R.string.tabel5_field1)}, " +
                    "${getString(R.string.tabel5_field2)}, " +
                    "${getString(R.string.tabel5_field3)}, " +
                    "${getString(R.string.tabel5_field4)}, " +
                    "${getString(R.string.tabel5_field5)}) " +
                    "VALUES ('$tabel5_field1Text', '$tabel5_field2Text', '$tabel5_field3Text', '$tabel5_field4Text', '$tabel5_field5Text')")
            Toast.makeText(this@Tabel5CreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
            Tabel5MainActivity.ma.RefreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

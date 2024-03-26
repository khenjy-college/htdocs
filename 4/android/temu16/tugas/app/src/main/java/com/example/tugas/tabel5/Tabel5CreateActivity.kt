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

    private lateinit var tabel5Field1: EditText
    private lateinit var tabel5Field2: EditText
    private lateinit var tabel5Field3: EditText
    private lateinit var tabel5Field4: EditText
    private lateinit var tabel5Field5: EditText

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
        tabel5Field1 = findViewById(R.id.tabel5_field1)
        tabel5Field2 = findViewById(R.id.tabel5_field2)
        tabel5Field3 = findViewById(R.id.tabel5_field3)
        tabel5Field4 = findViewById(R.id.tabel5_field4)
        tabel5Field5 = findViewById(R.id.tabel5_field5)
        btnSimpan = findViewById(R.id.btnSimpan)
        btnSimpan.setOnClickListener {
            val db = database.writableDatabase
            val tabel5Field1Text = tabel5Field1.text.toString()
            val tabel5Field2Text = tabel5Field2.text.toString()
            val tabel5Field3Text = tabel5Field3.text.toString()
            val tabel5Field4Text = tabel5Field4.text.toString()
            val tabel5Field5Text = tabel5Field5.text.toString()
            val tableName = getString(R.string.tabel5)
            db.execSQL("INSERT INTO $tableName (" +
                    "${getString(R.string.tabel5_field1)}, " +
                    "${getString(R.string.tabel5_field2)}, " +
                    "${getString(R.string.tabel5_field3)}, " +
                    "${getString(R.string.tabel5_field4)}, " +
                    "${getString(R.string.tabel5_field5)}) " +
                    "VALUES ('$tabel5Field1Text', '$tabel5Field2Text', '$tabel5Field3Text', '$tabel5Field4Text', '$tabel5Field5Text')")
            Toast.makeText(this@Tabel5CreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
            Tabel5MainActivity.ma.RefreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

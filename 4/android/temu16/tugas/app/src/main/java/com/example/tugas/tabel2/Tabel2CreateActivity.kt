package com.example.tugas.tabel2

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R

class Tabel2CreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSimpan: Button

    private lateinit var tabel2_field1: EditText
    private lateinit var tabel2_field2: EditText
    private lateinit var tabel2_field3: EditText
    private lateinit var tabel2_field4: EditText
    private lateinit var tabel2_field5: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel2_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        database = Database(this)
        tabel2_field1 = findViewById(R.id.tabel2_field1)
        tabel2_field2 = findViewById(R.id.tabel2_field2)
        tabel2_field3 = findViewById(R.id.tabel2_field3)
        tabel2_field4 = findViewById(R.id.tabel2_field4)
        tabel2_field5 = findViewById(R.id.tabel2_field5)
        btnSimpan = findViewById(R.id.btnSimpan)
        btnSimpan.setOnClickListener {
            val db = database.writableDatabase
            val tabel2_field1Text = tabel2_field1.text.toString()
            val tabel2_field2Text = tabel2_field2.text.toString()
            val tabel2_field3Text = tabel2_field3.text.toString()
            val tabel2_field4Text = tabel2_field4.text.toString()
            val tabel2_field5Text = tabel2_field5.text.toString()
            val tableName = getString(R.string.tabel2)
            db.execSQL("INSERT INTO $tableName (" +
                    "${getString(R.string.tabel2_field1)}, " +
                    "${getString(R.string.tabel2_field2)}, " +
                    "${getString(R.string.tabel2_field3)}, " +
                    "${getString(R.string.tabel2_field4)}, " +
                    "${getString(R.string.tabel2_field5)}) " +
                    "VALUES ('$tabel2_field1Text', '$tabel2_field2Text', '$tabel2_field3Text', '$tabel2_field4Text', '$tabel2_field5Text')")
            Toast.makeText(this@Tabel2CreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
            Tabel2MainActivity.ma.RefreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

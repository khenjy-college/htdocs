package com.example.temu6

import android.database.Cursor
import android.os.Bundle
import android.view.Menu
import android.widget.Button
import android.widget.EditText
import android.widget.ListView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class CreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var nama: EditText
    private lateinit var kampus: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        database = Database(this)
        nama = findViewById(R.id.nama)
        kampus = findViewById(R.id.kampus)
        val btn_simpan = findViewById<Button>(R.id.btn_simpan)
        btn_simpan.setOnClickListener {
            val db = database.writableDatabase
            val namaText = nama.text.toString()
            val kampusText = kampus.text.toString()
            db.execSQL("INSERT INTO mahasiswa (nama, kampus) VALUES ('$namaText', '$kampusText')")
            Toast.makeText(this@CreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
            MainActivity.mo.RefreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

package com.example.tugas1

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class BookmasterCreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btn_simpan: Button

    private lateinit var isbn: EditText
    private lateinit var nama: EditText
    private lateinit var tgl_tambah: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_bookmaster_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        database = Database(this)
        isbn = findViewById(R.id.isbn)
        nama = findViewById(R.id.nama)
        tgl_tambah = findViewById(R.id.tglTambah)
        btn_simpan = findViewById(R.id.btn_simpan)
        btn_simpan.setOnClickListener {
            val db = database.writableDatabase
            val isbnText = isbn.text.toString()
            val namaText = nama.text.toString()
            val tgl_tambahText = tgl_tambah.text.toString()
            db.execSQL("INSERT INTO bookmaster (isbn, nama, tgl_tambah) VALUES ('$isbnText', '$namaText', '$tgl_tambahText')")
            Toast.makeText(this@BookmasterCreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
            BookmasterMainActivity.mo.RefreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

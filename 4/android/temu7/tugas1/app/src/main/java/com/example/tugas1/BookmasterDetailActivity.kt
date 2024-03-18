package com.example.tugas1

import android.database.Cursor
import android.database.sqlite.SQLiteDatabase
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class BookmasterDetailActivity : AppCompatActivity() {
    protected lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var isbn:TextView
    private lateinit var nama:TextView
    private lateinit var tgl_tambah:TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_bookmaster_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        database = Database(this)
        isbn = findViewById(R.id.judulISBN)
        nama = findViewById(R.id.judulNama)
        tgl_tambah = findViewById(R.id.judulTglTambah)

        val db = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM bookmaster WHERE isbn = ?", arrayOf(intent.getStringExtra("isbn")))
        if (cursor.moveToFirst()) {
            isbn.text = cursor.getString(0)
            nama.text = cursor.getString(1)
            tgl_tambah.text = cursor.getString(2)
        }
    }
}
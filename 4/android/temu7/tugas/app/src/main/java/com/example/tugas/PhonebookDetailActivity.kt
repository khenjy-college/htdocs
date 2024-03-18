package com.example.tugas

import android.database.Cursor
import android.os.Bundle
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class PhonebookDetailActivity : AppCompatActivity() {
    protected lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var id:TextView
    private lateinit var nama:TextView
    private lateinit var no_hp:TextView
    private lateinit var tgl_lahir:TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_phonebook_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        database = Database(this)
        id = findViewById(R.id.judulId)
        nama = findViewById(R.id.judulNama)
        no_hp = findViewById(R.id.judulNoHp)
        tgl_lahir = findViewById(R.id.judulTglLahir)

        val db = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM phonebook WHERE id = ?", arrayOf(intent.getStringExtra("id")))
        if (cursor.moveToFirst()) {
            id.text = cursor.getString(0)
            nama.text = cursor.getString(1)
            no_hp.text = cursor.getString(2)
            tgl_lahir.text = cursor.getString(3)
        }
    }
}
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

class MahasiswaDetailActivity : AppCompatActivity() {
    protected lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var nama:TextView
    private lateinit var kampus:TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_mahasiswa_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        database = Database(this)
        nama = findViewById(R.id.judulNama)
        kampus = findViewById(R.id.judulKampus)

        val db = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM mahasiswa WHERE nama = ?", arrayOf(intent.getStringExtra("nama")))
        if (cursor.moveToFirst()) {
            nama.text = cursor.getString(0)
            kampus.text = cursor.getString(1)
        }
    }
}
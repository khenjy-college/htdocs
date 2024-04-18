package com.example.tugas.tabel8

import android.content.Intent
import android.database.Cursor
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R
import com.example.tugas.tabel6.Tabel6MainActivity

open class Tabel8DetailActivity : AppCompatActivity() {
    private lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var tabel8field1: TextView
    private lateinit var tabel8field2: TextView
    private lateinit var tabel8field3: TextView
    private lateinit var tabel8field4: TextView

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel8_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, Tabel8MainActivity::class.java))
        }

        database = Database(this)
        tabel8field1 = findViewById(R.id.tabel8field1)
        tabel8field2 = findViewById(R.id.tabel8field2)
        tabel8field3 = findViewById(R.id.tabel8field3)
        tabel8field4 = findViewById(R.id.tabel8field4)

        val db = database.readableDatabase
        val fieldExtra = intent.getStringExtra(getString(R.string.tabel8field1))
        cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel8)} WHERE ${getString(R.string.tabel8field1)} = ?",
            arrayOf(fieldExtra)
        )
        if (cursor.moveToFirst()) {
            tabel8field1.text = cursor.getString(0)
            tabel8field2.text = cursor.getString(1)
            tabel8field3.text = cursor.getString(2)
            tabel8field4.text = cursor.getString(3)
        }
    }
}

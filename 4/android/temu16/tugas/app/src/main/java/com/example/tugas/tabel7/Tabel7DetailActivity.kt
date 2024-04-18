package com.example.tugas.tabel7

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

open class Tabel7DetailActivity : AppCompatActivity() {
    private lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var tabel7field1: TextView
    private lateinit var tabel7field2: TextView
    private lateinit var tabel7field3: TextView
    private lateinit var tabel7field4: TextView

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel7_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, Tabel7MainActivity::class.java))
        }

        database = Database(this)
        tabel7field1 = findViewById(R.id.tabel7field1)
        tabel7field2 = findViewById(R.id.tabel7field2)
        tabel7field3 = findViewById(R.id.tabel7field3)
        tabel7field4 = findViewById(R.id.tabel7field4)

        val db = database.readableDatabase
        val fieldExtra = intent.getStringExtra(getString(R.string.tabel7field1))
        cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel7)} WHERE ${getString(R.string.tabel7field1)} = ?",
            arrayOf(fieldExtra)
        )
        if (cursor.moveToFirst()) {
            tabel7field1.text = cursor.getString(0)
            tabel7field2.text = cursor.getString(1)
            tabel7field3.text = cursor.getString(2)
            tabel7field4.text = cursor.getString(3)
        }
    }
}

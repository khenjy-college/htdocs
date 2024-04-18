package com.example.tugas.tabel5

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

open class Tabel5DetailActivity : AppCompatActivity() {
    private lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var tabel5field1: TextView
    private lateinit var tabel5field2: TextView
    private lateinit var tabel5field3: TextView
    private lateinit var tabel5field4: TextView
    private lateinit var tabel5field5: TextView

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel5_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, Tabel5MainActivity::class.java))
        }

        database = Database(this)
        tabel5field1 = findViewById(R.id.tabel5_field1)
        tabel5field2 = findViewById(R.id.tabel5_field2)
        tabel5field3 = findViewById(R.id.tabel5_field3)
        tabel5field4 = findViewById(R.id.tabel5_field4)
        tabel5field5 = findViewById(R.id.tabel5_field5)

        val db = database.readableDatabase
        val fieldExtra = intent.getStringExtra(getString(R.string.tabel5_field1))
        cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel5)} WHERE ${getString(R.string.tabel5_field1)} = ?",
            arrayOf(fieldExtra)
        )
        if (cursor.moveToFirst()) {
            tabel5field1.text = cursor.getString(0)
            tabel5field2.text = cursor.getString(1)
            tabel5field3.text = cursor.getString(2)
            tabel5field4.text = cursor.getString(3)
            tabel5field5.text = cursor.getString(4)
        }
    }
}

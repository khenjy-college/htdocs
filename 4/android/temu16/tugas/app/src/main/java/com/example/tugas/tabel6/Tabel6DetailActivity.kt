package com.example.tugas.tabel6

import android.database.Cursor
import android.os.Bundle
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R

class Tabel6DetailActivity : AppCompatActivity() {
    protected lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var tabel6_field1: TextView
    private lateinit var tabel6_field2: TextView
    private lateinit var tabel6_field3: TextView
    private lateinit var tabel6_field4: TextView
    private lateinit var tabel6_field5: TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel6_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        database = Database(this)
        tabel6_field1 = findViewById(R.id.tabel6_field1)
        tabel6_field2 = findViewById(R.id.tabel6_field2)
        tabel6_field3 = findViewById(R.id.tabel6_field3)
        tabel6_field4 = findViewById(R.id.tabel6_field4)
        tabel6_field5 = findViewById(R.id.tabel6_field5)

        val db = database.readableDatabase
        val fieldExtra = intent.getStringExtra(getString(R.string.tabel6_field1))
        cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel6)} WHERE ${getString(R.string.tabel6_field1)} = ?",
            arrayOf(fieldExtra)
        )
        if (cursor.moveToFirst()) {
            tabel6_field1.text = cursor.getString(0)
            tabel6_field2.text = cursor.getString(1)
            tabel6_field3.text = cursor.getString(2)
            tabel6_field4.text = cursor.getString(3)
            tabel6_field5.text = cursor.getString(4)
        }
    }
}

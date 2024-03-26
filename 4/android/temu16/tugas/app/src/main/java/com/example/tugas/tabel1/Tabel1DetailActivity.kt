package com.example.tugas.tabel1

import android.database.Cursor
import android.os.Bundle
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R

class Tabel1DetailActivity : AppCompatActivity() {
    protected lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var tabel1_field1: TextView
    private lateinit var tabel1_field2: TextView
    private lateinit var tabel1_field3: TextView
    private lateinit var tabel1_field4: TextView
    private lateinit var tabel1_field5: TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel1_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        database = Database(this)
        tabel1_field1 = findViewById(R.id.tabel1_field1)
        tabel1_field2 = findViewById(R.id.tabel1_field2)
        tabel1_field3 = findViewById(R.id.tabel1_field3)
        tabel1_field4 = findViewById(R.id.tabel1_field4)
        tabel1_field5 = findViewById(R.id.tabel1_field5)

        val db = database.readableDatabase
        val fieldExtra = intent.getStringExtra(getString(R.string.tabel1_field1))
        cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel1)} WHERE ${getString(R.string.tabel1_field1)} = ?",
            arrayOf(fieldExtra)
        )
        if (cursor.moveToFirst()) {
            tabel1_field1.text = cursor.getString(0)
            tabel1_field2.text = cursor.getString(1)
            tabel1_field3.text = cursor.getString(2)
            tabel1_field4.text = cursor.getString(3)
            tabel1_field5.text = cursor.getString(4)
        }
    }
}

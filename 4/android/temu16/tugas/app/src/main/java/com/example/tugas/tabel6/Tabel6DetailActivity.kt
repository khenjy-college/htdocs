package com.example.tugas.tabel6

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
import com.example.tugas.tabel5.Tabel5MainActivity

open class Tabel6DetailActivity : AppCompatActivity() {
    private lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var tabel6field1: TextView
    private lateinit var tabel6field2: TextView
    private lateinit var tabel6field3: TextView
    private lateinit var tabel6field4: TextView

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel6_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }


        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, Tabel6MainActivity::class.java))
        }

        database = Database(this)
        tabel6field1 = findViewById(R.id.tabel6_field1)
        tabel6field2 = findViewById(R.id.tabel6_field2)
        tabel6field3 = findViewById(R.id.tabel6_field3)
        tabel6field4 = findViewById(R.id.tabel6_field4)

        val db = database.readableDatabase
        val fieldExtra = intent.getStringExtra(getString(R.string.tabel6_field1))
        cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel6)} WHERE ${getString(R.string.tabel6_field1)} = ?",
            arrayOf(fieldExtra)
        )
        if (cursor.moveToFirst()) {
            tabel6field1.text = cursor.getString(0)
            tabel6field2.text = cursor.getString(1)
            tabel6field3.text = cursor.getString(2)
            tabel6field4.text = cursor.getString(3)
        }
    }
}

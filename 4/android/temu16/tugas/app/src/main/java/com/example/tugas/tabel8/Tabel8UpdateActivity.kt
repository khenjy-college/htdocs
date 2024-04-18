package com.example.tugas.tabel8

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R
import com.example.tugas.tabel6.Tabel6MainActivity

class Tabel8UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSave: Button

    private lateinit var tabel8field1: EditText
    private lateinit var tabel8field2: EditText
    private lateinit var tabel8field3: EditText
    private lateinit var tabel8field4: EditText

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel8_update)
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
        tabel8field1 = findViewById(R.id.tabel8_field1)
        tabel8field2 = findViewById(R.id.tabel8_field2)
        tabel8field3 = findViewById(R.id.tabel8_field3)
        tabel8field4 = findViewById(R.id.tabel8_field4)
        btnSave = findViewById(R.id.btn_Save)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel8_field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel8)} WHERE ${getString(R.string.tabel8_field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel8field1.setText(cursor.getString(0))
            tabel8field2.setText(cursor.getString(1))
            tabel8field3.setText(cursor.getString(2))
            tabel8field4.setText(cursor.getString(3))
        }
        cursor.close()

        btnSave.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel8field1Text = tabel8field1.text.toString()
            val tabel8field2Text = tabel8field2.text.toString()
            val tabel8field3Text = tabel8field3.text.toString()
            val tabel8field4Text = tabel8field4.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel8)} SET " +
                        "${getString(R.string.tabel8_field1)} = '$tabel8field1Text', " +
                        "${getString(R.string.tabel8_field2)} = '$tabel8field2Text', " +
                        "${getString(R.string.tabel8_field3)} = '$tabel8field3Text', " +
                        "${getString(R.string.tabel8_field4)} = '$tabel8field4Text'" +
                        "WHERE ${getString(R.string.tabel8_field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel8UpdateActivity,
                "Data Updated",
                Toast.LENGTH_SHORT
            ).show()

            Tabel8MainActivity.ma.refreshList()

            finish()
        }
    }
}

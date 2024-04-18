package com.example.tugas.tabel7

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

class Tabel7UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSave: Button

    private lateinit var tabel7field1: EditText
    private lateinit var tabel7field2: EditText
    private lateinit var tabel7field3: EditText
    private lateinit var tabel7field4: EditText

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel7_update)
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
        tabel7field1 = findViewById(R.id.tabel7_field1)
        tabel7field2 = findViewById(R.id.tabel7_field2)
        tabel7field3 = findViewById(R.id.tabel7_field3)
        tabel7field4 = findViewById(R.id.tabel7_field4)
        btnSave = findViewById(R.id.btn_Save)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel7_field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel7)} WHERE ${getString(R.string.tabel7_field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel7field1.setText(cursor.getString(0))
            tabel7field2.setText(cursor.getString(1))
            tabel7field3.setText(cursor.getString(2))
            tabel7field4.setText(cursor.getString(3))
        }
        cursor.close()

        btnSave.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel7field1Text = tabel7field1.text.toString()
            val tabel7field2Text = tabel7field2.text.toString()
            val tabel7field3Text = tabel7field3.text.toString()
            val tabel7field4Text = tabel7field4.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel7)} SET " +
                        "${getString(R.string.tabel7_field1)} = '$tabel7field1Text', " +
                        "${getString(R.string.tabel7_field2)} = '$tabel7field2Text', " +
                        "${getString(R.string.tabel7_field3)} = '$tabel7field3Text', " +
                        "${getString(R.string.tabel7_field4)} = '$tabel7field4Text'" +
                        "WHERE ${getString(R.string.tabel7_field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel7UpdateActivity,
                "Data Updated",
                Toast.LENGTH_SHORT
            ).show()

            Tabel7MainActivity.ma.refreshList()

            finish()
        }
    }
}

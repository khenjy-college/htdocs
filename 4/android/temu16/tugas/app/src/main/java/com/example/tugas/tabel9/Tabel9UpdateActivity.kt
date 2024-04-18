package com.example.tugas.tabel9

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

class Tabel9UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSave: Button

    private lateinit var tabel9field1: EditText
    private lateinit var tabel9field2: EditText
    private lateinit var tabel9field3: EditText
    private lateinit var tabel9field4: EditText

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel9_update)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, Tabel9MainActivity::class.java))
        }

        database = Database(this)
        tabel9field1 = findViewById(R.id.tabel9field1)
        tabel9field2 = findViewById(R.id.tabel9field2)
        tabel9field3 = findViewById(R.id.tabel9field3)
        tabel9field4 = findViewById(R.id.tabel9field4)
        btnSave = findViewById(R.id.btnSave)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel9field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel9)} WHERE ${getString(R.string.tabel9field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel9field1.setText(cursor.getString(0))
            tabel9field2.setText(cursor.getString(1))
            tabel9field3.setText(cursor.getString(2))
            tabel9field4.setText(cursor.getString(3))
        }
        cursor.close()

        btnSave.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel9field1Text = tabel9field1.text.toString()
            val tabel9field2Text = tabel9field2.text.toString()
            val tabel9field3Text = tabel9field3.text.toString()
            val tabel9field4Text = tabel9field4.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel9)} SET " +
                        "${getString(R.string.tabel9field1)} = '$tabel9field1Text', " +
                        "${getString(R.string.tabel9field2)} = '$tabel9field2Text', " +
                        "${getString(R.string.tabel9field3)} = '$tabel9field3Text', " +
                        "${getString(R.string.tabel9field4)} = '$tabel9field4Text'" +
                        "WHERE ${getString(R.string.tabel9field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel9UpdateActivity,
                "Data Updated",
                Toast.LENGTH_SHORT
            ).show()

            Tabel9MainActivity.ma.refreshList()

            finish()
        }
    }
}

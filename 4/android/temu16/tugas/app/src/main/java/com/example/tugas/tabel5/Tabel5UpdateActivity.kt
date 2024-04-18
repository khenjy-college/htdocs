package com.example.tugas.tabel5

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

class Tabel5UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSave: Button

    private lateinit var tabel5field1: EditText
    private lateinit var tabel5field2: EditText
    private lateinit var tabel5field3: EditText
    private lateinit var tabel5field4: EditText
    private lateinit var tabel5field5: EditText

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel5_update)
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
        btnSave = findViewById(R.id.btn_Save)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel5_field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel5)} WHERE ${getString(R.string.tabel5_field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel5field1.setText(cursor.getString(0))
            tabel5field2.setText(cursor.getString(1))
            tabel5field3.setText(cursor.getString(2))
            tabel5field4.setText(cursor.getString(3))
            tabel5field5.setText(cursor.getString(4))
        }
        cursor.close()

        btnSave.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel5field1Text = tabel5field1.text.toString()
            val tabel5field2Text = tabel5field2.text.toString()
            val tabel5field3Text = tabel5field3.text.toString()
            val tabel5field4Text = tabel5field4.text.toString()
            val tabel5field5Text = tabel5field5.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel5)} SET " +
                        "${getString(R.string.tabel5_field1)} = '$tabel5field1Text', " +
                        "${getString(R.string.tabel5_field2)} = '$tabel5field2Text', " +
                        "${getString(R.string.tabel5_field3)} = '$tabel5field3Text', " +
                        "${getString(R.string.tabel5_field4)} = '$tabel5field4Text', " +
                        "${getString(R.string.tabel5_field5)} = '$tabel5field5Text' " +
                        "WHERE ${getString(R.string.tabel5_field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel5UpdateActivity,
                "Data Updated",
                Toast.LENGTH_SHORT
            ).show()

            Tabel5MainActivity.ma.refreshList()

            finish()
        }
    }
}

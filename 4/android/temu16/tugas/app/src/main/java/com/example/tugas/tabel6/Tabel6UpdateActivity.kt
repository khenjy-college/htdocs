package com.example.tugas.tabel6

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
import com.example.tugas.tabel5.Tabel5MainActivity

class Tabel6UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSave: Button

    private lateinit var tabel6field1: EditText
    private lateinit var tabel6field2: EditText
    private lateinit var tabel6field3: EditText
    private lateinit var tabel6field4: EditText

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel6_update)
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
        tabel6field1 = findViewById(R.id.tabel6field1)
        tabel6field2 = findViewById(R.id.tabel6field2)
        tabel6field3 = findViewById(R.id.tabel6field3)
        tabel6field4 = findViewById(R.id.tabel6field4)
        btnSave = findViewById(R.id.btn_Save)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel6field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel6)} WHERE ${getString(R.string.tabel6field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel6field1.setText(cursor.getString(0))
            tabel6field2.setText(cursor.getString(1))
            tabel6field3.setText(cursor.getString(2))
            tabel6field4.setText(cursor.getString(3))
        }
        cursor.close()

        btnSave.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel6field1Text = tabel6field1.text.toString()
            val tabel6field2Text = tabel6field2.text.toString()
            val tabel6field3Text = tabel6field3.text.toString()
            val tabel6field4Text = tabel6field4.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel6)} SET " +
                        "${getString(R.string.tabel6field1)} = '$tabel6field1Text', " +
                        "${getString(R.string.tabel6field2)} = '$tabel6field2Text', " +
                        "${getString(R.string.tabel6field3)} = '$tabel6field3Text', " +
                        "${getString(R.string.tabel6field4)} = '$tabel6field4Text'" +
                        "WHERE ${getString(R.string.tabel6field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel6UpdateActivity,
                "Data Updated",
                Toast.LENGTH_SHORT
            ).show()

            Tabel6MainActivity.ma.refreshList()

            finish()
        }
    }
}

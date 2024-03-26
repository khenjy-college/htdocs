package com.example.tugas.tabel10

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.tugas.Database
import com.example.tugas.R

class Tabel10UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSimpan: Button

    private lateinit var tabel10_field1: EditText
    private lateinit var tabel10_field2: EditText
    private lateinit var tabel10_field3: EditText
    private lateinit var tabel10_field4: EditText
    private lateinit var tabel10_field5: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel10_update)

        database = Database(this)
        tabel10_field1 = findViewById(R.id.tabel10_field1)
        tabel10_field2 = findViewById(R.id.tabel10_field2)
        tabel10_field3 = findViewById(R.id.tabel10_field3)
        tabel10_field4 = findViewById(R.id.tabel10_field4)
        tabel10_field5 = findViewById(R.id.tabel10_field5)
        btnSimpan = findViewById(R.id.btn_simpan)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel10_field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel10)} WHERE ${getString(R.string.tabel10_field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel10_field1.setText(cursor.getString(0))
            tabel10_field2.setText(cursor.getString(1))
            tabel10_field3.setText(cursor.getString(2))
            tabel10_field4.setText(cursor.getString(3))
            tabel10_field5.setText(cursor.getString(4))
        }
        cursor.close()

        btnSimpan.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel10_field1Text = tabel10_field1.text.toString()
            val tabel10_field2Text = tabel10_field2.text.toString()
            val tabel10_field3Text = tabel10_field3.text.toString()
            val tabel10_field4Text = tabel10_field4.text.toString()
            val tabel10_field5Text = tabel10_field5.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel10)} SET " +
                        "${getString(R.string.tabel10_field1)} = '$tabel10_field1Text', " +
                        "${getString(R.string.tabel10_field2)} = '$tabel10_field2Text', " +
                        "${getString(R.string.tabel10_field3)} = '$tabel10_field3Text', " +
                        "${getString(R.string.tabel10_field4)} = '$tabel10_field4Text', " +
                        "${getString(R.string.tabel10_field5)} = '$tabel10_field5Text' " +
                        "WHERE ${getString(R.string.tabel10_field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel10UpdateActivity,
                "Data berhasil diupdate",
                Toast.LENGTH_SHORT
            ).show()

            Tabel10MainActivity.ma.RefreshList()

            finish()
        }
    }
}

package com.example.tugas.tabel3

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.tugas.Database
import com.example.tugas.R

class Tabel3UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSimpan: Button

    private lateinit var tabel3_field1: EditText
    private lateinit var tabel3_field2: EditText
    private lateinit var tabel3_field3: EditText
    private lateinit var tabel3_field4: EditText
    private lateinit var tabel3_field5: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel3_update)

        database = Database(this)
        tabel3_field1 = findViewById(R.id.tabel3_field1)
        tabel3_field2 = findViewById(R.id.tabel3_field2)
        tabel3_field3 = findViewById(R.id.tabel3_field3)
        tabel3_field4 = findViewById(R.id.tabel3_field4)
        tabel3_field5 = findViewById(R.id.tabel3_field5)
        btnSimpan = findViewById(R.id.btn_simpan)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel3_field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel3)} WHERE ${getString(R.string.tabel3_field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel3_field1.setText(cursor.getString(0))
            tabel3_field2.setText(cursor.getString(1))
            tabel3_field3.setText(cursor.getString(2))
            tabel3_field4.setText(cursor.getString(3))
            tabel3_field5.setText(cursor.getString(4))
        }
        cursor.close()

        btnSimpan.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel3_field1Text = tabel3_field1.text.toString()
            val tabel3_field2Text = tabel3_field2.text.toString()
            val tabel3_field3Text = tabel3_field3.text.toString()
            val tabel3_field4Text = tabel3_field4.text.toString()
            val tabel3_field5Text = tabel3_field5.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel3)} SET " +
                        "${getString(R.string.tabel3_field1)} = '$tabel3_field1Text', " +
                        "${getString(R.string.tabel3_field2)} = '$tabel3_field2Text', " +
                        "${getString(R.string.tabel3_field3)} = '$tabel3_field3Text', " +
                        "${getString(R.string.tabel3_field4)} = '$tabel3_field4Text', " +
                        "${getString(R.string.tabel3_field5)} = '$tabel3_field5Text' " +
                        "WHERE ${getString(R.string.tabel3_field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel3UpdateActivity,
                "Data berhasil diupdate",
                Toast.LENGTH_SHORT
            ).show()

            Tabel3MainActivity.ma.RefreshList()

            finish()
        }
    }
}

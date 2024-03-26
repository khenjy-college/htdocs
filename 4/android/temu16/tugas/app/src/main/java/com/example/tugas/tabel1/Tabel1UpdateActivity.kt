package com.example.tugas.tabel1

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.tugas.Database
import com.example.tugas.R

class Tabel1UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSimpan: Button

    private lateinit var tabel1_field1: EditText
    private lateinit var tabel1_field2: EditText
    private lateinit var tabel1_field3: EditText
    private lateinit var tabel1_field4: EditText
    private lateinit var tabel1_field5: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel1_update)

        database = Database(this)
        tabel1_field1 = findViewById(R.id.tabel1_field1)
        tabel1_field2 = findViewById(R.id.tabel1_field2)
        tabel1_field3 = findViewById(R.id.tabel1_field3)
        tabel1_field4 = findViewById(R.id.tabel1_field4)
        tabel1_field5 = findViewById(R.id.tabel1_field5)
        btnSimpan = findViewById(R.id.btn_simpan)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel1_field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel1)} WHERE ${getString(R.string.tabel1_field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel1_field1.setText(cursor.getString(0))
            tabel1_field2.setText(cursor.getString(1))
            tabel1_field3.setText(cursor.getString(2))
            tabel1_field4.setText(cursor.getString(3))
            tabel1_field5.setText(cursor.getString(4))
        }
        cursor.close()

        btnSimpan.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel1_field1Text = tabel1_field1.text.toString()
            val tabel1_field2Text = tabel1_field2.text.toString()
            val tabel1_field3Text = tabel1_field3.text.toString()
            val tabel1_field4Text = tabel1_field4.text.toString()
            val tabel1_field5Text = tabel1_field5.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel1)} SET " +
                        "${getString(R.string.tabel1_field1)} = '$tabel1_field1Text', " +
                        "${getString(R.string.tabel1_field2)} = '$tabel1_field2Text', " +
                        "${getString(R.string.tabel1_field3)} = '$tabel1_field3Text', " +
                        "${getString(R.string.tabel1_field4)} = '$tabel1_field4Text', " +
                        "${getString(R.string.tabel1_field5)} = '$tabel1_field5Text' " +
                        "WHERE ${getString(R.string.tabel1_field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel1UpdateActivity,
                "Data berhasil diupdate",
                Toast.LENGTH_SHORT
            ).show()

            Tabel1MainActivity.ma.RefreshList()

            finish()
        }
    }
}

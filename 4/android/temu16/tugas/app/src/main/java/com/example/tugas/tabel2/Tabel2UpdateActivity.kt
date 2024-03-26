package com.example.tugas.tabel2

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.tugas.Database
import com.example.tugas.R

class Tabel2UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSimpan: Button

    private lateinit var tabel2_field1: EditText
    private lateinit var tabel2_field2: EditText
    private lateinit var tabel2_field3: EditText
    private lateinit var tabel2_field4: EditText
    private lateinit var tabel2_field5: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel2_update)

        database = Database(this)
        tabel2_field1 = findViewById(R.id.tabel2_field1)
        tabel2_field2 = findViewById(R.id.tabel2_field2)
        tabel2_field3 = findViewById(R.id.tabel2_field3)
        tabel2_field4 = findViewById(R.id.tabel2_field4)
        tabel2_field5 = findViewById(R.id.tabel2_field5)
        btnSimpan = findViewById(R.id.btn_simpan)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel2_field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel2)} WHERE ${getString(R.string.tabel2_field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel2_field1.setText(cursor.getString(0))
            tabel2_field2.setText(cursor.getString(1))
            tabel2_field3.setText(cursor.getString(2))
            tabel2_field4.setText(cursor.getString(3))
            tabel2_field5.setText(cursor.getString(4))
        }
        cursor.close()

        btnSimpan.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel2_field1Text = tabel2_field1.text.toString()
            val tabel2_field2Text = tabel2_field2.text.toString()
            val tabel2_field3Text = tabel2_field3.text.toString()
            val tabel2_field4Text = tabel2_field4.text.toString()
            val tabel2_field5Text = tabel2_field5.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel2)} SET " +
                        "${getString(R.string.tabel2_field1)} = '$tabel2_field1Text', " +
                        "${getString(R.string.tabel2_field2)} = '$tabel2_field2Text', " +
                        "${getString(R.string.tabel2_field3)} = '$tabel2_field3Text', " +
                        "${getString(R.string.tabel2_field4)} = '$tabel2_field4Text', " +
                        "${getString(R.string.tabel2_field5)} = '$tabel2_field5Text' " +
                        "WHERE ${getString(R.string.tabel2_field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel2UpdateActivity,
                "Data berhasil diupdate",
                Toast.LENGTH_SHORT
            ).show()

            Tabel2MainActivity.ma.RefreshList()

            finish()
        }
    }
}

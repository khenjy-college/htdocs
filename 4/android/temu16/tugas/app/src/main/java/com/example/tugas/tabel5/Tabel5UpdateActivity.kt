package com.example.tugas.tabel5

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.example.tugas.Database
import com.example.tugas.R

class Tabel5UpdateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSimpan: Button

    private lateinit var tabel5Field1: EditText
    private lateinit var tabel5Field2: EditText
    private lateinit var tabel5Field3: EditText
    private lateinit var tabel5Field4: EditText
    private lateinit var tabel5Field5: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tabel5_update)

        database = Database(this)
        tabel5Field1 = findViewById(R.id.tabel5_field1)
        tabel5Field2 = findViewById(R.id.tabel5_field2)
        tabel5Field3 = findViewById(R.id.tabel5_field3)
        tabel5Field4 = findViewById(R.id.tabel5_field4)
        tabel5Field5 = findViewById(R.id.tabel5_field5)
        btnSimpan = findViewById(R.id.btn_simpan)

        val db = database.readableDatabase
        val isbnExtra = intent.getStringExtra(getString(R.string.tabel5_field1)) // Retrieve the Field passed from the intent
        val cursor = db.rawQuery(
            "SELECT * FROM ${getString(R.string.tabel5)} WHERE ${getString(R.string.tabel5_field1)} = ?",
            arrayOf(isbnExtra)
        )

        if (cursor.count > 0) {
            cursor.moveToFirst()
            tabel5Field1.setText(cursor.getString(0))
            tabel5Field2.setText(cursor.getString(1))
            tabel5Field3.setText(cursor.getString(2))
            tabel5Field4.setText(cursor.getString(3))
            tabel5Field5.setText(cursor.getString(4))
        }
        cursor.close()

        btnSimpan.setOnClickListener {
            val dbWrite = database.writableDatabase
            val tabel5Field1Text = tabel5Field1.text.toString()
            val tabel5Field2Text = tabel5Field2.text.toString()
            val tabel5Field3Text = tabel5Field3.text.toString()
            val tabel5Field4Text = tabel5Field4.text.toString()
            val tabel5Field5Text = tabel5Field5.text.toString()

            dbWrite.execSQL(
                "UPDATE ${getString(R.string.tabel5)} SET " +
                        "${getString(R.string.tabel5_field1)} = '$tabel5Field1Text', " +
                        "${getString(R.string.tabel5_field2)} = '$tabel5Field2Text', " +
                        "${getString(R.string.tabel5_field3)} = '$tabel5Field3Text', " +
                        "${getString(R.string.tabel5_field4)} = '$tabel5Field4Text', " +
                        "${getString(R.string.tabel5_field5)} = '$tabel5Field5Text' " +
                        "WHERE ${getString(R.string.tabel5_field1)} = ?",
                arrayOf(isbnExtra)
            )

            Toast.makeText(
                this@Tabel5UpdateActivity,
                "Data berhasil diupdate",
                Toast.LENGTH_SHORT
            ).show()

            Tabel5MainActivity.ma.RefreshList()

            finish()
        }
    }
}

package com.example.temu6

import android.database.Cursor
import android.database.sqlite.SQLiteDatabase
import android.os.Bundle
import android.widget.ArrayAdapter
import android.widget.Button
import android.widget.EditText
import android.widget.ListView
import android.widget.Toast
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class UpdateActivity : AppCompatActivity() {
    private lateinit var cursor: Cursor
    private lateinit var database: Database
    private lateinit var btnSimpan: Button
    private lateinit var kampus: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_update)

        database = Database(this)
        val nama = findViewById<EditText>(R.id.nama)
        kampus = findViewById(R.id.nama)
        kampus = findViewById(R.id.kampus)
        btnSimpan = findViewById(R.id.btn_simpan)

        val db = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM mahasiswa WHERE nama = ?", arrayOf(intent.getStringExtra("nama")))
        cursor.moveToFirst()

        if (cursor.count > 0) {
            cursor.moveToPosition(0)
            nama.setText(cursor.getString(0))
            kampus.setText(cursor.getString(1))
        }

        btnSimpan.setOnClickListener {
            val dbWrite = database.writableDatabase
            val newName = nama.text.toString()
            val newCampus = kampus.text.toString()

            dbWrite.execSQL(
                "UPDATE mahasiswa SET nama = '$newName', kampus = '$newCampus' WHERE nama = ?",
                arrayOf(intent.getStringExtra("nama"))
            )

            Toast.makeText(this@UpdateActivity, "Data berhasil diupdate", Toast.LENGTH_SHORT).show()
            MainActivity.mo.RefreshList()
            finish()
        }
    }
}

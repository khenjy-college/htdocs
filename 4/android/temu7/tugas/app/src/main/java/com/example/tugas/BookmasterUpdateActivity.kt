package com.example.tugas

import android.database.Cursor
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity

class BookmasterUpdateActivity : AppCompatActivity() {
    private lateinit var cursor: Cursor

    private lateinit var database: Database
    private lateinit var btn_simpan: Button

    private lateinit var isbn: EditText
    private lateinit var nama: EditText
    private lateinit var tgl_tambah: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_bookmaster_update)

        database = Database(this)
        isbn = findViewById(R.id.isbn)
        nama = findViewById(R.id.nama)
        tgl_tambah = findViewById(R.id.tglTambah)
        btn_simpan = findViewById(R.id.btn_simpan)

        val db = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM bookmaster WHERE isbn = ?", arrayOf(intent.getStringExtra("isbn")))
        cursor.moveToFirst()

        if (cursor.count > 0) {
            cursor.moveToPosition(0)
            isbn.setText(cursor.getString(0))
            nama.setText(cursor.getString(1))
            tgl_tambah.setText(cursor.getString(2))
        }

        btn_simpan.setOnClickListener {
            val dbWrite = database.writableDatabase

            val isbnTextNew = isbn.text.toString()
            val namaTextNew = nama.text.toString()
            val tgl_tambahTextNew = tgl_tambah.text.toString()

            dbWrite.execSQL(
                "UPDATE bookmaster SET " +
                        "isbn = '$isbnTextNew', " +
                        "nama = '$namaTextNew', " +
                        "tgl_tambah = '$tgl_tambahTextNew' " +
                        "WHERE isbn = ?",
                arrayOf(intent.getStringExtra("isbn"))
            )

            Toast.makeText(this@BookmasterUpdateActivity, "Data berhasil diupdate", Toast.LENGTH_SHORT).show()
            BookmasterMainActivity.bma.RefreshList()
            finish()
        }
    }
}

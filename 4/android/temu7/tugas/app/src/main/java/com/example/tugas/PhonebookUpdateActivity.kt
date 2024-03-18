package com.example.tugas

import android.database.Cursor
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity

class PhonebookUpdateActivity : AppCompatActivity() {
    private lateinit var cursor: Cursor

    private lateinit var database: Database
    private lateinit var btn_update: Button

    private lateinit var id: EditText
    private lateinit var nama: EditText
    private lateinit var no_hp: EditText
    private lateinit var tgl_lahir: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_phonebook_update)

        database = Database(this)
        id = findViewById(R.id.id)
        nama = findViewById(R.id.nama)
        no_hp = findViewById(R.id.noHp)
        tgl_lahir = findViewById(R.id.tglLahir)
        btn_update = findViewById(R.id.btn_update)

        val db = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM phonebook WHERE id = ?", arrayOf(intent.getStringExtra("id")))
        cursor.moveToFirst()

        if (cursor.count > 0) {
            cursor.moveToPosition(0)
            id.setText(cursor.getString(0))
            nama.setText(cursor.getString(1))
            no_hp.setText(cursor.getString(2))
            tgl_lahir.setText(cursor.getString(3))
        }

        btn_update.setOnClickListener {
            val dbWrite = database.writableDatabase

            val idTextNew = id.text.toString()
            val namaTextNew = nama.text.toString()
            val no_hpTextNew = no_hp.text.toString()
            val tgl_lahirTextNew = tgl_lahir.text.toString()

            dbWrite.execSQL(
                "UPDATE phonebook SET " +
                        "id = '$idTextNew', " +
                        "nama = '$namaTextNew', " +
                        "no_hp = '$no_hpTextNew', " +
                        "tgl_lahir = '$tgl_lahirTextNew' " +
                        "WHERE id = ?",
                arrayOf(intent.getStringExtra("id"))
            )

            Toast.makeText(this@PhonebookUpdateActivity, "Data berhasil diupdate", Toast.LENGTH_SHORT).show()
            PhonebookMainActivity.pma.RefreshList()
            finish()
        }
    }
}

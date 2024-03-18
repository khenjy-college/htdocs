package com.example.tugas

import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class PhonebookCreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btn_simpan: Button

    private lateinit var id: EditText
    private lateinit var nama: EditText
    private lateinit var no_hp: EditText
    private lateinit var tgl_lahir: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_phonebook_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        database = Database(this)
        id = findViewById(R.id.id)
        nama = findViewById(R.id.nama)
        no_hp = findViewById(R.id.noHp)
        tgl_lahir = findViewById(R.id.tglLahir)
        btn_simpan = findViewById(R.id.btn_simpan)
        btn_simpan.setOnClickListener {
            val db = database.writableDatabase
            val idText = id.text.toString()
            val namaText = nama.text.toString()
            val no_hpText = no_hp.text.toString()
            val tgl_lahirText = tgl_lahir.text.toString()
            db.execSQL("INSERT INTO phonebook (id, nama, no_hp, tgl_lahir) VALUES ('$idText', '$namaText', '$no_hpText', '$tgl_lahirText')")
            Toast.makeText(this@PhonebookCreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
            PhonebookMainActivity.pma.RefreshList()
            finish()
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

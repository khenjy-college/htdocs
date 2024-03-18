package com.example.tugas

import android.database.Cursor
import android.os.Bundle
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class MahasiswaDetailActivity : AppCompatActivity() {
    protected lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var nimTextView: TextView
    private lateinit var namaTextView: TextView
    private lateinit var prodiTextView: TextView
    private lateinit var alamatTextView: TextView
    private lateinit var tgl_lahirTextView: TextView
    private lateinit var jenis_kelaminTextView: TextView
    private lateinit var isActiveTextView: TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_mahasiswa_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        database = Database(this)
        nimTextView = findViewById(R.id.nimTextView)
        namaTextView = findViewById(R.id.namaTextView)
        prodiTextView = findViewById(R.id.prodiTextView)
        alamatTextView = findViewById(R.id.alamatTextView)
        tgl_lahirTextView = findViewById(R.id.tgl_lahirTextView)
        jenis_kelaminTextView = findViewById(R.id.jenis_kelaminTextView)
        isActiveTextView = findViewById(R.id.isActiveTextView)

        val db = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM mahasiswa WHERE nim = ?", arrayOf(intent.getStringExtra("nim")))
        if (cursor.moveToFirst()) {
            nimTextView.text = cursor.getString(cursor.getColumnIndex("nim"))
            namaTextView.text = cursor.getString(cursor.getColumnIndex("nama"))
            prodiTextView.text = cursor.getString(cursor.getColumnIndex("prodi"))
            alamatTextView.text = cursor.getString(cursor.getColumnIndex("alamat"))
            tgl_lahirTextView.text = cursor.getString(cursor.getColumnIndex("tgl_lahir"))
            jenis_kelaminTextView.text = cursor.getString(cursor.getColumnIndex("jenis_kelamin"))
            isActiveTextView.text = cursor.getString(cursor.getColumnIndex("isActive"))
        }
    }
}

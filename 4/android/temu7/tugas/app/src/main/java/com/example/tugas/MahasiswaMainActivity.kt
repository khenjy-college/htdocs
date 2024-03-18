package com.example.tugas

import android.content.Intent
import android.database.Cursor
import android.database.sqlite.SQLiteDatabase
import android.os.Bundle
import android.widget.ArrayAdapter
import android.widget.ListView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AlertDialog
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.google.android.material.floatingactionbutton.FloatingActionButton

class MahasiswaMainActivity : AppCompatActivity() {
    private lateinit var daftar: Array<String>
    private lateinit var listView: ListView
    private lateinit var cursor: Cursor

    private lateinit var database: Database

    companion object {
        lateinit var mma: MahasiswaMainActivity
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_mahasiswa_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        val fab: FloatingActionButton = findViewById(R.id.fabMahasiswa)
        fab.setOnClickListener {
            val intent = Intent(this@MahasiswaMainActivity, MahasiswaCreateActivity::class.java)
            startActivity(intent)
        }

        mma = this
        database = Database(this)
        listView = findViewById(R.id.listViewMahasiswa)
        refreshList()
    }

    fun refreshList() {
        val db: SQLiteDatabase = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM mahasiswa", null)
        daftar = Array(cursor.count) { "" }
        cursor.moveToFirst()
        for (i in 0 until cursor.count) {
            cursor.moveToPosition(i)
            daftar[i] = cursor.getString(0)
        }
        listView.adapter = ArrayAdapter(this, android.R.layout.simple_list_item_1, daftar)
        listView.isSelected = true

        listView.setOnItemClickListener { _, _, position, _ ->
            val selection = daftar[position]
            val dialogItems = arrayOf<CharSequence>("Lihat Mahasiswa", "Update Mahasiswa", "Hapus Mahasiswa")
            val builder = AlertDialog.Builder(this@MahasiswaMainActivity)
            builder.setTitle("Pilihan")
            builder.setItems(dialogItems) { _, item ->
                when (item) {
                    0 -> {
                        val intent = Intent(applicationContext, MahasiswaDetailActivity::class.java)
                        intent.putExtra("nim", selection)
                        startActivity(intent)
                    }
                    1 -> {
                        val intent = Intent(applicationContext, MahasiswaUpdateActivity::class.java)
                        intent.putExtra("nim", selection)
                        startActivity(intent)
                    }
                    2 -> {
                        val db = database.writableDatabase
                        db.execSQL("DELETE FROM mahasiswa WHERE nim = '$selection'")
                        refreshList()
                    }
                }
            }
            builder.create().show()
        }
    }
}

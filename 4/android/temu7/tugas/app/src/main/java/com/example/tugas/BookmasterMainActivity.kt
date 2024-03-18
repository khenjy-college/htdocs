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

class BookmasterMainActivity : AppCompatActivity() {
    private lateinit var daftar: Array<String>
    private lateinit var listview: ListView
    private lateinit var cursor: Cursor

    private lateinit var database: Database

    companion object {
        lateinit var bma: BookmasterMainActivity
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_bookmaster_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        val fab: FloatingActionButton = findViewById(R.id.fabBookmaster)
        fab.setOnClickListener {
            val pindah = Intent(this@BookmasterMainActivity, BookmasterCreateActivity::class.java)
            startActivity(pindah)
        }

        bma = this
        database = Database(this)
        listview = findViewById(R.id.listViewBookmaster)
        RefreshList()
    }

    fun RefreshList() {
        val db: SQLiteDatabase = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM bookmaster", null)
        daftar = Array(cursor.count) { "" }
        cursor.moveToFirst()
        for (i in 0 until cursor.count) {
            cursor.moveToPosition(i)
            daftar[i] = cursor.getString(0)
        }
        listview.adapter = ArrayAdapter(this, android.R.layout.simple_list_item_1, daftar)
        listview.isSelected = true

        listview.setOnItemClickListener { _, _, position, _ ->
            val selection = daftar[position]
            val dialogitem = arrayOf<CharSequence>("Lihat Buku", "Update Buku", "Hapus Buku")
            val builder = AlertDialog.Builder(this@BookmasterMainActivity)
            builder.setTitle("Pilihan")
            builder.setItems(dialogitem) { _, item ->
                when (item) {
                    0 -> {
                        val intent = Intent(applicationContext, BookmasterDetailActivity::class.java)
                        intent.putExtra("isbn", selection)
                        startActivity(intent)
                    }
                    1 -> {
                        val intent = Intent(applicationContext, BookmasterUpdateActivity::class.java)
                        intent.putExtra("isbn", selection)
                        startActivity(intent)
                    }
                    2 -> {
                        val db = database.writableDatabase
                        db.execSQL("DELETE FROM bookmaster WHERE isbn = '$selection'")
                        RefreshList()
                    }
                }
            }
            builder.create().show()
        }
    }
}

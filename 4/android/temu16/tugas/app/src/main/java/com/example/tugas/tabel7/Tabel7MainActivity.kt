package com.example.tugas.tabel7

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
import com.example.tugas.Database
import com.example.tugas.R
import com.google.android.material.floatingactionbutton.FloatingActionButton

class Tabel7MainActivity : AppCompatActivity() {
    private lateinit var daftar: Array<String>
    private lateinit var listview: ListView
    private lateinit var cursor: Cursor

    private lateinit var database: Database

    companion object {
        lateinit var ma: Tabel7MainActivity
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel7_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        val fab: FloatingActionButton = findViewById(R.id.fabTabel7)
        fab.setOnClickListener {
            val pindah = Intent(this@Tabel7MainActivity, Tabel7CreateActivity::class.java)
            startActivity(pindah)
        }

        ma = this
        database = Database(this)
        listview = findViewById(R.id.listViewTabel7)
        RefreshList()
    }

    fun RefreshList() {
        val db: SQLiteDatabase = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM ${getString(R.string.tabel7)}", null)
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
            val dialogitem = arrayOf<CharSequence>(
                "Lihat ${getString(R.string.tabel7_alias)}",
                "Update ${getString(R.string.tabel7_alias)}",
                "Hapus ${getString(R.string.tabel7_alias)}"
            )
            val builder = AlertDialog.Builder(this@Tabel7MainActivity)
            builder.setTitle("Pilihan")
            builder.setItems(dialogitem) { _, item ->
                when (item) {
                    0 -> {
                        val intent =
                            Intent(applicationContext, Tabel7DetailActivity::class.java)
                        intent.putExtra(getString(R.string.tabel7_field1), selection)
                        startActivity(intent)
                    }

                    1 -> {
                        val intent =
                            Intent(applicationContext, Tabel7UpdateActivity::class.java)
                        intent.putExtra(getString(R.string.tabel7_field1), selection)
                        startActivity(intent)
                    }

                    2 -> {
                        val db = database.writableDatabase
                        db.execSQL("DELETE FROM ${getString(R.string.tabel7)} WHERE ${getString(R.string.tabel7_field1)} = '$selection'")
                        RefreshList()
                    }
                }
            }
            builder.create().show()
        }
    }
}

package com.example.tugas.tabel8

import android.annotation.SuppressLint
import android.content.Intent
import android.database.Cursor
import android.database.sqlite.SQLiteDatabase
import android.os.Bundle
import android.widget.ArrayAdapter
import android.widget.Button
import android.widget.ListView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AlertDialog
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.MainActivity
import com.example.tugas.R
import com.google.android.material.floatingactionbutton.FloatingActionButton

@Suppress("NAME_SHADOWING")
class Tabel8MainActivity : AppCompatActivity() {
    private lateinit var list: Array<String>
    private lateinit var listview: ListView
    private lateinit var cursor: Cursor

    private lateinit var database: Database

    private lateinit var back: Button

    companion object {
        @SuppressLint("StaticFieldLeak")
        lateinit var ma: Tabel8MainActivity
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel8_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, MainActivity::class.java))
        }

        val fab: FloatingActionButton = findViewById(R.id.fabTabel8)
        fab.setOnClickListener {
            val move = Intent(this@Tabel8MainActivity, Tabel8CreateActivity::class.java)
            startActivity(move)
        }

        ma = this
        database = Database(this)
        listview = findViewById(R.id.listViewTabel8)
        refreshList()
    }

    fun refreshList() {
        val db: SQLiteDatabase = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM ${getString(R.string.tabel8)}", null)
        list = Array(cursor.count) { "" }
        cursor.moveToFirst()
        for (i in 0 until cursor.count) {
            cursor.moveToPosition(i)
            list[i] = cursor.getString(0)
        }
        listview.adapter = ArrayAdapter(this, android.R.layout.simple_list_item_1, list)
        listview.isSelected = true

        listview.setOnItemClickListener { _, _, position, _ ->
            val selection = list[position]
            val items = arrayOf<CharSequence>(
                "Lihat ${getString(R.string.tabel8_alias)}",
                "Update ${getString(R.string.tabel8_alias)}",
                "Delete ${getString(R.string.tabel8_alias)}"
            )
            val builder = AlertDialog.Builder(this@Tabel8MainActivity)
            builder.setTitle("Choices")
            builder.setItems(items) { _, item ->
                when (item) {
                    0 -> {
                        val intent =
                            Intent(applicationContext, Tabel8DetailActivity::class.java)
                        intent.putExtra(getString(R.string.tabel8field1), selection)
                        startActivity(intent)
                    }

                    1 -> {
                        val intent =
                            Intent(applicationContext, Tabel8UpdateActivity::class.java)
                        intent.putExtra(getString(R.string.tabel8field1), selection)
                        startActivity(intent)
                    }

                    2 -> {
                        val db = database.writableDatabase
                        db.execSQL("DELETE FROM ${getString(R.string.tabel8)} WHERE ${getString(R.string.tabel8field1)} = '$selection'")
                        refreshList()
                    }
                }
            }
            builder.create().show()
        }
    }
}

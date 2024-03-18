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

class PhonebookMainActivity : AppCompatActivity() {
    private lateinit var daftar: Array<String>
    private lateinit var listview: ListView
    private lateinit var cursor: Cursor

    private lateinit var database: Database

    companion object {
        lateinit var pma: PhonebookMainActivity
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_phonebook_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        val fab: FloatingActionButton = findViewById(R.id.fabPhonebook)
        fab.setOnClickListener {
            val pindah = Intent(this@PhonebookMainActivity, PhonebookCreateActivity::class.java)
            startActivity(pindah)
        }

        pma = this
        database = Database(this)
        listview = findViewById(R.id.listViewPhonebook)
        RefreshList()
    }

    fun RefreshList() {
        val db: SQLiteDatabase = database.readableDatabase
        cursor = db.rawQuery("SELECT * FROM phonebook", null)
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
            val dialogitem = arrayOf<CharSequence>("Lihat Phonebook", "Update Phonebook", "Hapus Phonebook")
            val builder = AlertDialog.Builder(this@PhonebookMainActivity)
            builder.setTitle("Pilihan")
            builder.setItems(dialogitem) { _, item ->
                when (item) {
                    0 -> {
                        val intent = Intent(applicationContext, PhonebookDetailActivity::class.java)
                        intent.putExtra("id", selection)
                        startActivity(intent)
                    }
                    1 -> {
                        val intent = Intent(applicationContext, PhonebookUpdateActivity::class.java)
                        intent.putExtra("id", selection)
                        startActivity(intent)
                    }
                    2 -> {
                        val db = database.writableDatabase
                        db.execSQL("DELETE FROM phonebook WHERE id = '$selection'")
                        RefreshList()
                    }
                }
            }
            builder.create().show()
        }
    }
}

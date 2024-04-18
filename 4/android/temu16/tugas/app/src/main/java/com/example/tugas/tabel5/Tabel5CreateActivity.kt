package com.example.tugas.tabel5

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.Database
import com.example.tugas.R

class Tabel5CreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var btnSave: Button

    private lateinit var tabel5field1: EditText
    private lateinit var tabel5field2: EditText
    private lateinit var tabel5field3: EditText
    private lateinit var tabel5field4: EditText

    private lateinit var back: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_tabel5_create)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        back = findViewById(R.id.backButton)
        back.setOnClickListener {
            startActivity(Intent(this, Tabel5MainActivity::class.java))
        }

        database = Database(this)
        tabel5field1 = findViewById(R.id.tabel5field1)
        tabel5field2 = findViewById(R.id.tabel5field2)
        tabel5field3 = findViewById(R.id.tabel5field3)
        tabel5field4 = findViewById(R.id.tabel5field4)
        btnSave = findViewById(R.id.btnSave)
        btnSave.setOnClickListener {
            val db = database.writableDatabase
            val tabel5field1Text = tabel5field1.text.toString()
            val tabel5field2Text = tabel5field2.text.toString()
            val tabel5field3Text = tabel5field3.text.toString()
            val tabel5field4Text = tabel5field4.text.toString()
            val tableName = getString(R.string.tabel5)

            try {
                val insertQuery = "INSERT INTO $tableName (" +
                        "${getString(R.string.tabel5field1)}, " +
                        "${getString(R.string.tabel5field2)}, " +
                        "${getString(R.string.tabel5field3)}, " +
                        "${getString(R.string.tabel5field4)}) " +
                        "VALUES ('$tabel5field1Text', '$tabel5field2Text', '$tabel5field3Text', '$tabel5field4Text')"

                db.execSQL(insertQuery)
                Toast.makeText(this@Tabel5CreateActivity, "Data Saved", Toast.LENGTH_SHORT).show()
                Tabel5MainActivity.ma.refreshList()
                finish()
            } catch (e: Exception) {
                e.printStackTrace()
                Toast.makeText(this@Tabel5CreateActivity, "Error saving data", Toast.LENGTH_SHORT).show()
            } finally {
                db.close()
            }
        }
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

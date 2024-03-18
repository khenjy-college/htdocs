package com.example.tugas

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class MainActivity : AppCompatActivity() {

    private lateinit var mahasiswa: Button
    private lateinit var phonebook: Button
    private lateinit var bookmaster: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        mahasiswa=findViewById(R.id.buttonMahasiswa)
        phonebook=findViewById(R.id.buttonPhonebook)
        bookmaster = findViewById(R.id.buttonBookmaster)

        mahasiswa.setOnClickListener {
            startActivity(Intent(this, MahasiswaMainActivity::class.java))
        }

        phonebook.setOnClickListener {
            startActivity(Intent(this, PhonebookMainActivity::class.java))
        }

        bookmaster.setOnClickListener{
            startActivity(Intent(this, BookmasterMainActivity::class.java))
        }
    }
}
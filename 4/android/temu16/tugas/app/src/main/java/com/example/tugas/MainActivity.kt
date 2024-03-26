package com.example.tugas

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.tabel5.Tabel5MainActivity

class MainActivity : AppCompatActivity() {

    private lateinit var mahasiswa: Button
    private lateinit var phonebook: Button
    private lateinit var tabel5: Button

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
        tabel5 = findViewById(R.id.buttonTabel5)

        mahasiswa.setOnClickListener {
            startActivity(Intent(this, MahasiswaMainActivity::class.java))
        }

        phonebook.setOnClickListener {
            startActivity(Intent(this, PhonebookMainActivity::class.java))
        }

        tabel5.setOnClickListener{
            startActivity(Intent(this, Tabel5MainActivity::class.java))
        }
    }
}
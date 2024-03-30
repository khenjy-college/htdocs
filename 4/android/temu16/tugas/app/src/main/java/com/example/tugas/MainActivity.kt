package com.example.tugas

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tugas.tabel10.Tabel10MainActivity
import com.example.tugas.tabel4.Tabel4MainActivity
import com.example.tugas.tabel5.Tabel5MainActivity
import com.example.tugas.tabel6.Tabel6MainActivity
import com.example.tugas.tabel7.Tabel7MainActivity
import com.example.tugas.tabel8.Tabel8MainActivity
import com.example.tugas.tabel9.Tabel9MainActivity

class MainActivity : AppCompatActivity() {

    private lateinit var button4: Button
    private lateinit var button5: Button
    private lateinit var button6: Button
    private lateinit var button7: Button
    private lateinit var button8: Button
    private lateinit var button9: Button
    private lateinit var button10: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        button4 = findViewById(R.id.buttonTabel4)
        button4.setOnClickListener {
            val pindah = Intent(this@MainActivity, Tabel4MainActivity::class.java)
            startActivity(pindah)
        }

        button5 = findViewById(R.id.buttonTabel5)
        button5.setOnClickListener {
            val pindah = Intent(this@MainActivity, Tabel5MainActivity::class.java)
            startActivity(pindah)
        }

        button6 = findViewById(R.id.buttonTabel6)
        button6.setOnClickListener {
            val pindah = Intent(this@MainActivity, Tabel6MainActivity::class.java)
            startActivity(pindah)
        }

        button7 = findViewById(R.id.buttonTabel7)
        button7.setOnClickListener {
            val pindah = Intent(this@MainActivity, Tabel7MainActivity::class.java)
            startActivity(pindah)
        }

        button8 = findViewById(R.id.buttonTabel8)
        button8.setOnClickListener {
            val pindah = Intent(this@MainActivity, Tabel8MainActivity::class.java)
            startActivity(pindah)
        }

        button9 = findViewById(R.id.buttonTabel9)
        button9.setOnClickListener {
            val pindah = Intent(this@MainActivity, Tabel9MainActivity::class.java)
            startActivity(pindah)
        }

        button10 = findViewById(R.id.buttonTabel10)
        button10.setOnClickListener {
            val pindah = Intent(this@MainActivity, Tabel10MainActivity::class.java)
            startActivity(pindah)
        }
    }
}

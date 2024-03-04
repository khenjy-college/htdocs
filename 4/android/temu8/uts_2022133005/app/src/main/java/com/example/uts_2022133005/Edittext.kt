package com.example.uts_2022133005

import android.os.Bundle
import android.view.View
import android.widget.EditText
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity

class EditTextActivity : AppCompatActivity() {

    private lateinit var editTextNama: EditText
    private lateinit var editTextGajiPokok: EditText
    private lateinit var editTextTunjangan: EditText
    private lateinit var textViewTotalGaji: TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_edittext)

        editTextNama = findViewById(R.id.editTextNama)
        editTextGajiPokok = findViewById(R.id.editTextGajiPokok)
        editTextTunjangan = findViewById(R.id.editTextTunjangan)
        textViewTotalGaji = findViewById(R.id.textViewTotalGaji)
    }

    fun hitungGaji(view: View) {
        val nama = editTextNama.text.toString()
        val gajiPokok = editTextGajiPokok.text.toString().toDouble()
        val tunjangan = editTextTunjangan.text.toString().toDouble()

        // Hitung total gaji dengan mengurangi pajak 5%
        val totalGaji = gajiPokok + tunjangan - (gajiPokok * 0.05)

        // Tampilkan total gaji
        textViewTotalGaji.text = "Total Gaji untuk $nama: $totalGaji"
    }
}

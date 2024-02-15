package com.example.temu3

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.widget.Button
import android.widget.EditText

class tugas : AppCompatActivity() {
    private lateinit var hargaemas:EditText
    private lateinit var nilaikarat:EditText
    private lateinit var jlhemas:EditText
    private lateinit var biaya:EditText
    private lateinit var hasilharga:EditText
    private lateinit var hasiljlh:EditText
    private lateinit var total:EditText
    private lateinit var hitung:Button
    private lateinit var reset:Button
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_tugas)
        hargaemas = findViewById(R.id.editHargaEmas)
        nilaikarat = findViewById(R.id.editNilaiKarat)
        jlhemas = findViewById(R.id.editJlhEmas)
        biaya = findViewById(R.id.editBiaya)
        hasilharga = findViewById(R.id.editHarga)
        hasiljlh = findViewById(R.id.editJlh)
        total = findViewById(R.id.editTotal)

        hitung.setOnClickListener {
            val he = hargaemas.text.toString()
            val nk = nilaikarat.text.toString()
            val je = jlhemas.text.toString()
            val b = biaya.text.toString()

            val harga = he.toFloat() * (nk.toFloat()/24)
            val hargatotal = (harga.toFloat() * je.toFloat()) + (b.toFloat() * je.toFloat())

            hasilharga.setText(hargaemas.toString())
            hasiljlh.setText(jlhemas.toString())
            total.setText(hargatotal.toString())

        }

    }

}

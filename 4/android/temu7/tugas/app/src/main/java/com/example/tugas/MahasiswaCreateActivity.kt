package com.example.tugas

import android.os.Bundle
import android.view.View
import android.widget.ArrayAdapter
import android.widget.Button
import android.widget.EditText
import android.widget.RadioGroup
import android.widget.Spinner
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.google.android.material.datepicker.MaterialDatePicker
import java.text.SimpleDateFormat
import java.util.Calendar
import java.util.Locale

class MahasiswaCreateActivity : AppCompatActivity() {
    private lateinit var database: Database
    private lateinit var prodiSpinner: Spinner
    private lateinit var jenisKelaminSpinner: Spinner
    private lateinit var nimEditText: EditText
    private lateinit var namaEditText: EditText
    private lateinit var alamatEditText: EditText
    private lateinit var tglLahirEditText: EditText
    private lateinit var isActiveRadioGroup: RadioGroup
    private lateinit var simpanButton: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_mahasiswa_create)

        // Initialize Views
        nimEditText = findViewById(R.id.nimEditText)
        namaEditText = findViewById(R.id.namaEditText)
        alamatEditText = findViewById(R.id.alamatEditText)
        prodiSpinner = findViewById(R.id.prodiSpinner)
        jenisKelaminSpinner = findViewById(R.id.jenisKelaminSpinner)
        tglLahirEditText = findViewById(R.id.tglLahirEditText)
        isActiveRadioGroup = findViewById(R.id.isActiveRadioGroup)
        simpanButton = findViewById(R.id.simpanButton)

        // Initialize Database
        database = Database(this)

        // Populate Spinners
        populateProdiSpinner()
        populateJenisKelaminSpinner()

        // Set Click Listener for Simpan Button
        simpanButton.setOnClickListener {
            saveMahasiswa()
        }
    }

    private fun populateProdiSpinner() {
        val prodiList = listOf("Teknik Informatika", "Sistem Informasi", "Teknik Elektro", "Teknik Industri")
        val adapter = ArrayAdapter(this, android.R.layout.simple_spinner_item, prodiList)
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
        prodiSpinner.adapter = adapter
    }

    private fun populateJenisKelaminSpinner() {
        val jenisKelaminList = listOf("Laki-laki", "Perempuan")
        val adapter = ArrayAdapter(this, android.R.layout.simple_spinner_item, jenisKelaminList)
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
        jenisKelaminSpinner.adapter = adapter
    }

    fun showDatePickerDialog(view: View) {
        val builder = MaterialDatePicker.Builder.datePicker()
        val picker = builder.build()

        picker.addOnPositiveButtonClickListener { selectedDate ->
            val calendar = Calendar.getInstance()
            calendar.timeInMillis = selectedDate
            val dateFormat = SimpleDateFormat("dd/MM/yyyy", Locale.getDefault())
            val dateString = dateFormat.format(calendar.time)
            tglLahirEditText.setText(dateString)
        }

        picker.show(supportFragmentManager, picker.toString())
    }

    private fun saveMahasiswa() {
        val db = database.writableDatabase
        val nimText = nimEditText.text.toString()
        val namaText = namaEditText.text.toString()
        val prodiText = prodiSpinner.selectedItem.toString()
        val alamatText = alamatEditText.text.toString()
        val tgl_lahirText = tglLahirEditText.text.toString()
        val jenis_kelaminText = jenisKelaminSpinner.selectedItem.toString()
        val isActiveText = if (isActiveRadioGroup.checkedRadioButtonId == R.id.yesRadioButton) "Ya" else "Tidak"

        val query = "INSERT INTO mahasiswa " +
                "(nim, nama, prodi, alamat, tgl_lahir, jenis_kelamin, isActive) VALUES " +
                "('$nimText', '$namaText', '$prodiText', '$alamatText', '$tgl_lahirText', '$jenis_kelaminText', '$isActiveText')"
        db.execSQL(query)
        Toast.makeText(this@MahasiswaCreateActivity, "Data tersimpan", Toast.LENGTH_SHORT).show()
        MahasiswaMainActivity.mma.refreshList()
        finish()
    }

    private fun enableEdgeToEdge() {
        // Your implementation for enabling edge-to-edge
    }
}

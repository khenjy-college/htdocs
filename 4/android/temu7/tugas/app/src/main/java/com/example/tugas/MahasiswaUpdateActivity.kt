package com.example.tugas

import android.database.Cursor
import android.os.Bundle
import android.widget.ArrayAdapter
import android.widget.Button
import android.widget.DatePicker
import android.widget.EditText
import android.widget.RadioGroup
import android.widget.Spinner
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity

class MahasiswaUpdateActivity : AppCompatActivity() {
    private lateinit var cursor: Cursor

    private lateinit var database: Database
    private lateinit var btn_simpan: Button

    private lateinit var nimEditText: EditText
    private lateinit var namaEditText: EditText
    private lateinit var prodiSpinner: Spinner
    private lateinit var alamatEditText: EditText
    private lateinit var tglLahirDatePicker: DatePicker
    private lateinit var jenisKelaminSpinner: Spinner
    private lateinit var isActiveRadioGroup: RadioGroup


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_mahasiswa_update)


        nimEditText = findViewById(R.id.nimEditText)
        namaEditText = findViewById(R.id.namaEditText)
        prodiSpinner = findViewById(R.id.prodiSpinner)
        alamatEditText = findViewById(R.id.alamatEditText)
        tglLahirDatePicker = findViewById(R.id.tglLahirDatePicker)
        jenisKelaminSpinner = findViewById(R.id.jenisKelaminSpinner)
        isActiveRadioGroup = findViewById(R.id.isActiveRadioGroup)
        btn_simpan = findViewById(R.id.btn_update)


        database = Database(this)

        // Populate Spinners
        populateProdiSpinner()
        populateJenisKelaminSpinner()

        // Set Click Listener for Simpan Button
        btn_simpan.setOnClickListener {
            updateMahasiswa()
        }

        // Load existing Mahasiswa data
        val nim = intent.getStringExtra("nim")
        loadMahasiswa(nim)


        btn_simpan.setOnClickListener {
            updateMahasiswa()
        }
    }

    private fun populateProdiSpinner() {
        val prodiList = listOf("Teknik Informatika", "Sistem Informasi", "Teknik Elektro", "Teknik Industri")
        val adapter = ArrayAdapter(this, android.R.layout.simple_spinner_item, prodiList)
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
        prodiSpinner.adapter = adapter
    }

    private fun populateJenisKelaminSpinner() {
        val jenisKelaminList = listOf("Laki-laki", "Perempuan") // Atau dapat diambil dari database jika terdapat tabel jenis kelamin
        val adapter = ArrayAdapter(this, android.R.layout.simple_spinner_item, jenisKelaminList)
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item)
        jenisKelaminSpinner.adapter = adapter
    }

    private fun loadMahasiswa(nim: String?) {
        val db = database.readableDatabase
        val cursor = db.rawQuery("SELECT * FROM mahasiswa WHERE nim = ?", arrayOf(nim))

        if (cursor.moveToFirst()) {
            nimEditText.setText(cursor.getString(cursor.getColumnIndex("nim")))
            namaEditText.setText(cursor.getString(cursor.getColumnIndex("nama")))
            alamatEditText.setText(cursor.getString(cursor.getColumnIndex("alamat")))

            // Parsing and initializing DatePicker
            val tgl_lahirString = cursor.getString(cursor.getColumnIndex("tgl_lahir"))
            if (tgl_lahirString != null && tgl_lahirString.isNotEmpty()) {
                val year = tgl_lahirString.substring(0, 4).toInt()
                val month = tgl_lahirString.substring(5, 7).toInt() - 1
                val day = tgl_lahirString.substring(8, 10).toInt()
                tglLahirDatePicker.init(year, month, day, null)
            }

            // Set selection for Prodi Spinner
            val prodi = cursor.getString(cursor.getColumnIndex("prodi"))
            if (::prodiSpinner.isInitialized) {
                val prodiAdapter = prodiSpinner.adapter as ArrayAdapter<String>
                val prodiIndex = prodiAdapter.getPosition(prodi)
                prodiSpinner.setSelection(prodiIndex)
            }

            // Set selection for Jenis Kelamin Spinner
            val jenisKelamin = cursor.getString(cursor.getColumnIndex("jenis_kelamin"))
            if (::jenisKelaminSpinner.isInitialized) {
                val jenisKelaminAdapter = jenisKelaminSpinner.adapter as ArrayAdapter<String>
                val jenisKelaminIndex = jenisKelaminAdapter.getPosition(jenisKelamin)
                jenisKelaminSpinner.setSelection(jenisKelaminIndex)
            }

            // Set selection for IsActive RadioGroup
            val isActive = cursor.getString(cursor.getColumnIndex("isActive"))
            if (::isActiveRadioGroup.isInitialized) {
                if (isActive == "Ya") {
                    isActiveRadioGroup.check(R.id.yesRadioButton)
                } else {
                    isActiveRadioGroup.check(R.id.noRadioButton)
                }
            }
        }

        cursor.close()
    }



    private fun updateMahasiswa() {
        val dbWrite = database.writableDatabase
        val nimTextNew = nimEditText.text.toString()
        val namaTextNew = namaEditText.text.toString()
        val prodiTextNew = prodiSpinner.selectedItem.toString()
        val alamatTextNew = alamatEditText.text.toString()
        val tgl_lahirTextNew = "${tglLahirDatePicker.year}-${tglLahirDatePicker.month + 1}-${tglLahirDatePicker.dayOfMonth}"
        val jenis_kelaminTextNew = jenisKelaminSpinner.selectedItem.toString()
        val isActiveTextNew = if (isActiveRadioGroup.checkedRadioButtonId == R.id.yesRadioButton) "Ya" else "Tidak"

        dbWrite.execSQL(
            "UPDATE mahasiswa SET " +
                    "nim = '$nimTextNew', " +
                    "nama = '$namaTextNew', " +
                    "prodi = '$prodiTextNew', " +
                    "alamat = '$alamatTextNew', " +
                    "tgl_lahir = '$tgl_lahirTextNew', " +
                    "jenis_kelamin = '$jenis_kelaminTextNew', " +
                    "isActive = '$isActiveTextNew' " +
                    "WHERE nim = ?",
            arrayOf(intent.getStringExtra("nim"))
        )

        Toast.makeText(this@MahasiswaUpdateActivity, "Data berhasil diupdate", Toast.LENGTH_SHORT).show()
        MahasiswaMainActivity.mma.refreshList()
        finish()
    }


}
